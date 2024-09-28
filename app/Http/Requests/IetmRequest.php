<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IetmRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return $this->rulesForCreate();
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            return $this->rulesForUpdate();
        }
        return [];

    }
    protected function rulesForCreate(): array
    {
        return [
            'details' => ['required', 'string', 'max:250'],
            'section_id' => ['required', 'exists:sections,id'],
            'name' => ['required', 'string', 'max:255'],
            'path' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'price' => ['required', 'integer', 'min:1'],
        ];
    }

    protected function rulesForUpdate(): array
    {
        return [
            'details' => ['required', 'string', 'max:250'],
            'section_id' => ['required', 'exists:sections,id'],
            'name' => ['required','string', 'max:255'],
            'path' => [ 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'price' => ['required', 'integer', 'min:1'],
        ];
    }
}
