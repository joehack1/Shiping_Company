<?php

namespace App\Http\Controllers;

use App\Models\ChatLead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = trim($request->input('message'));
        $state = session('chat_state', 'idle');
        $data = session('chat_data', []);

        // Logic Engine
        $response = $this->processMessage($message, $state, $data);

        // Update Session
        session(['chat_state' => $response['next_state']]);
        session(['chat_data' => $response['data']]);

        return response()->json([
            'reply' => $response['reply'],
            'options' => $response['options'] ?? null
        ]);
    }

    private function processMessage($input, $state, $data)
    {
        $inputLower = strtolower($input);

        // Global Interrupts
        if ($inputLower == 'reset' || $inputLower == 'restart') {
            return [
                'reply' => "Okay, let's start over. How can I help you today?",
                'next_state' => 'idle',
                'data' => []
            ];
        }

        switch ($state) {
            case 'idle':
                if (str_contains($inputLower, 'quiz') || str_contains($inputLower, 'assessment') || str_contains($inputLower, 'start')) {
                    return [
                        'reply' => "Great! Let's find the best shipping solution for you. First question: Are you exporting (sending out of Kenya) or importing (bringing into Kenya)?",
                        'next_state' => 'quiz_type',
                        'data' => [],
                        'options' => ['Exporting', 'Importing']
                    ];
                }
                
                // Default fallback to Lead Capture if interest shown
                return [
                    'reply' => "I'd be happy to help with that. To get started, may I have your full name?",
                    'next_state' => 'capture_name',
                    'data' => ['initial_query' => $input]
                ];

            // --- QUIZ FLOW ---
            case 'quiz_type':
                $data['type'] = $input;
                return [
                    'reply' => "Got it. What type of goods are you shipping? (e.g., Electronics, Textiles, Machinery, Personal Items)",
                    'next_state' => 'quiz_goods',
                    'data' => $data
                ];

            case 'quiz_goods':
                $data['product_type'] = $input;
                return [
                    'reply' => "Is this a commercial shipment or personal effects?",
                    'next_state' => 'quiz_purpose',
                    'data' => $data,
                    'options' => ['Commercial', 'Personal']
                ];

            case 'quiz_purpose':
                $data['purpose'] = $input;
                return [
                    'reply' => "Understood. Roughly what is the estimated weight or volume? (e.g., 50kg, 1 container, small box)",
                    'next_state' => 'quiz_size',
                    'data' => $data
                ];

            case 'quiz_size':
                $data['weight'] = $input;
                return [
                    'reply' => "And finally, what is the destination (or origin) country?",
                    'next_state' => 'quiz_country',
                    'data' => $data
                ];

            case 'quiz_country':
                $data['country'] = $input;
                // Recommendation Logic
                $recommendation = "Based on your needs, ";
                if (str_contains(strtolower($data['weight'] ?? ''), 'container')) {
                    $recommendation .= "Ocean Freight (FCL) seems best.";
                } elseif (str_contains(strtolower($data['type'] ?? ''), 'export')) {
                     $recommendation .= "our Export Logistics service is ideal.";
                } else {
                    $recommendation .= "we can tailor a solution for you.";
                }
                
                return [
                    'reply' => $recommendation . " I'll just need your contact details to send you the full report and quote. What is your full name?",
                    'next_state' => 'capture_name',
                    'data' => $data
                ];

            // --- LEAD CAPTURE FLOW ---
            case 'capture_name':
                $data['name'] = $input;
                return [
                    'reply' => "Thanks, " . explode(' ', $input)[0] . ". What is your email address?",
                    'next_state' => 'capture_email',
                    'data' => $data
                ];

            case 'capture_email':
                $data['email'] = $input;
                return [
                    'reply' => "And a phone number where we can reach you? (Optional, just type 'skip' if you prefer email only)",
                    'next_state' => 'capture_phone',
                    'data' => $data
                ];

            case 'capture_phone':
                $data['phone'] = ($inputLower === 'skip') ? null : $input;
                
                // If we came from Quiz, we have details. If not, ask details.
                if (isset($data['product_type'])) {
                    $this->saveLead($data);
                    return [
                        'reply' => "Thank you! I've passed this to our logistics team. They will review your needs (" . $data['product_type'] . " to " . ($data['country'] ?? 'destination') . ") and email you shortly.",
                        'next_state' => 'finished',
                        'data' => $data
                    ];
                } else {
                    return [
                        'reply' => "Great. Could you briefly describe what you are looking to ship (product, origin, destination)?",
                        'next_state' => 'capture_details',
                        'data' => $data
                    ];
                }

            case 'capture_details':
                $data['product_type'] = $input; // Storing generic details here
                $this->saveLead($data);
                return [
                    'reply' => "Perfect. Our team has received your request and will be in touch via email shortly with a quote.",
                    'next_state' => 'finished',
                    'data' => $data
                ];

            case 'finished':
                return [
                    'reply' => "Is there anything else I can help you with? You can say 'restart' to start over.",
                    'next_state' => 'idle', // Loop back to idle but keep history? Or just stay finished. Let's go idle to allow new Qs.
                    'data' => []
                ];

            default:
                return [
                    'reply' => "I'm not sure I understood. Could you rephrase that?",
                    'next_state' => 'idle',
                    'data' => $data
                ];
        }
    }

    private function saveLead($data)
    {
        try {
            $lead = ChatLead::create([
                'name' => $data['name'] ?? 'Guest',
                'email' => $data['email'] ?? null,
                'phone' => $data['phone'] ?? null,
                'product_type' => $data['product_type'] ?? null,
                'origin' => str_contains(strtolower($data['type'] ?? ''), 'import') ? ($data['country'] ?? null) : 'Kenya',
                'destination' => str_contains(strtolower($data['type'] ?? ''), 'export') ? ($data['country'] ?? null) : 'Kenya',
                'weight' => $data['weight'] ?? null,
                'transcript' => json_encode($data),
                'status' => 'new'
            ]);

            // Notify Admin
            try {
                Mail::raw("New Chat Lead:\n\nName: {$lead->name}\nEmail: {$lead->email}\nPhone: {$lead->phone}\nDetails: " . json_encode($data), function ($m) {
                    $m->to('info@anzunzucommercialexports.com')->subject('New Chatbot Lead');
                });
            } catch (\Throwable $e) {
                // Silent fail for mail
            }

        } catch (\Exception $e) {
            Log::error('Chat save error: ' . $e->getMessage());
        }
    }
}
