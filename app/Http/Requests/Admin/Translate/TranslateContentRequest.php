<?php

namespace App\Http\Requests\Admin\Translate;

use Illuminate\Foundation\Http\FormRequest;

class TranslateContentRequest extends FormRequest
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
            'contentId' => 'required|integer',
            'route' => 'required|string',
            'locale' => 'required|string',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
