<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'cake_id'      => ['required', 'integer'],
            'name_client'  => ['required', 'string'],
            'email_client' => ['required', 'string'],
            'email_sent'   => ['required', 'integer'],
        ];
    }
}
