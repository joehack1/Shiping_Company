<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuoteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    public function rules(): array
    {
        return [
            'service_type' => ['required', 'string', 'max:255'],
            'origin_country' => ['nullable', 'string', 'max:255'],
            'destination_country' => ['nullable', 'string', 'max:255'],
            'cargo_description' => ['nullable', 'string'],
            'weight_kg' => ['nullable', 'numeric', 'min:0'],
            'volume_cbm' => ['nullable', 'numeric', 'min:0'],
            'ready_date' => ['nullable', 'date'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
        ];
    }
}
