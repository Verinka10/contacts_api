<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'phone' => 'string|max:255',
            'comment' => 'string|max:255',
            'email' => 'string|max:255' . '|email|unique:contact,email,' . $this->input('id'),
        ];
    }
}
