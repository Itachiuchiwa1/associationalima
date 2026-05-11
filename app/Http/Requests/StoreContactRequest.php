<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10|max:5000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Votre nom est requis',
            'email.required' => 'Votre email est requis',
            'email.email' => 'Veuillez entrer un email valide',
            'subject.required' => 'Le sujet est requis',
            'message.required' => 'Votre message est requis',
            'message.min' => 'Votre message doit contenir au moins 10 caractères',
        ];
    }
}
