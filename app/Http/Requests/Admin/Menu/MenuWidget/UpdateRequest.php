<?php

namespace App\Http\Requests\Admin\Menu\MenuWidget;

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
            'name' => 'required|string',
            'lang' => 'required|string',
            'position' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Це поле мусить бути заповнене!',
            'name.string' => 'Данні повинні відповідати строковому типу!',
        ];
    }
}
