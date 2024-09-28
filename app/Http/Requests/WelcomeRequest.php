<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WelcomeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'logo_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'main_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hight_light' => 'required|string',
        ];
    }
}
