<?php

namespace App\Http\Requests\Admin\Blog\Post;

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
            'custom_date' => 'date_format:Y-m-d H:i:s',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'content' => 'required|string',
        //    'original_content_id' => 'required|integer',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'category_id' => 'required|integer',
            'category_ids' => 'required|array',
            'category_ids.*' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
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
            'meta_keywords.string' => 'Данні повинні відповідати строковому типу!',
            'meta_description.string' => 'Данні повинні відповідати строковому типу!',
            'preview_image.required' => 'Це поле мусить бути заповнене!',
            'preview_image.file' => 'Необхідно вибрати файл!',
            'main_image.required' => 'Це поле мусить бути заповнене!',
            'main_image.file' => 'Необхідно вибрати файл!',
            'category_ids.required' => 'Це поле мусить бути заповнене!',
            'category_ids.integer' => 'ID категорії повинно бути числом!',
            'category_ids.exists' => 'ID категорії повинно бути в базі данних',
            'tag_ids.array' => 'Необхідно відправити массив данних!',
        ];
    }
}
