<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Change if authorization is required
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (str_word_count($value) <= 10) {
                        $fail('The ' . $attribute . ' must be at least 10 words.');
                    }
                }
            ],
            'category' => 'required|string',
            'duedate' => 'required|date|after_or_equal:today',
            'priority' => 'required|string'
        ];
    }
}
