<?php

namespace App\Http\Requests\Admin\Media\Image;

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
            'images.*' => 'required|mimes:png,jpg,jpeg,webp|max:2048',
            'media_folder_path' => 'required|string',
            'original_content_id' => 'required|string',
            'original_content_type' => 'required|string',
            'lang' => 'required|string',
            'cover' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
