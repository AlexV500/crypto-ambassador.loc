<?php

namespace App\Http\Requests\Admin\Page;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'lang' => 'required|string',
            'title' => 'required|string',
            'uri' => 'required|string',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'content' => 'required|string',
            'original_content_id' => 'required|string',
            'images' => 'nullable|array',
            'images.*' => 'nullable|file|mimes:png,jpg,jpeg,webp|max:2048',
            'published' => 'integer',
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
