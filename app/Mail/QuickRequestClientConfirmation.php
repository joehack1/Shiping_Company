<?php

namespace App\Mail;

use App\Models\QuickRequest;
use App\Models\Service;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuickRequestClientConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public QuickRequest $requestData;
    public $services;

    public function __construct(QuickRequest $requestData)
    {
        $this->requestData = $requestData;
        $ids = collect($requestData->service_ids ?? []);
        $this->services = Service::query()->whereIn('id', $ids)->get();
    }

    public function build()
    {
        return $this->subject('We received your request')
            ->view('emails.quick_request_client_confirmation');
    }
}
