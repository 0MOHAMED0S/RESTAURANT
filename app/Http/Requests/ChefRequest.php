<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChefRequest extends FormRequest
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
            'details' => 'required|string',
            'name' => 'required|string',
            'path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rank' => 'required|string',
        ];
    }

    protected function rulesForUpdate(): array
    {
        return [
            'name' => 'required|string',
            'rank' => 'required|string',
            'path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'details' => 'required|string',
        ];
    }
}
