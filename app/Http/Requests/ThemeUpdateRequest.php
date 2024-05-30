<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemeUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'color' => ['required', 'string'],
            'text_color' => ['required', 'string'],
            'button_rounded' => ['required', 'string'],
            'button_bg' => ['required', 'string'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }
}
