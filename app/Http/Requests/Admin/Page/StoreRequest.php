<?php

namespace App\Http\Requests\Admin\Page;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'uri' => 'required|string|unique:posts',
            'content' => 'required|string',
            'lang' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Це поле мусить бути заповнене!',
            'title.string' => 'Данні повинні відповідати строковому типу!',
            'uri.required' => 'Це поле мусить бути заповнене!',
            'uri.string' => 'Данні повинні відповідати строковому типу!',
        ];
    }
}
