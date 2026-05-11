<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnonymousQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'question' => 'required|string|min:10|max:1000',
            'category' => 'nullable|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'question.required' => 'Votre question est requise',
            'question.min' => 'La question doit contenir au moins 10 caractères',
            'question.max' => 'La question ne peut pas dépasser 1000 caractères',
        ];
    }
}
