<?php

namespace App\Http\Requests\Admin\Menu\MenuItem;

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
            'label' => 'required|string',
            'menu_widget_id' => 'required|integer',
            'url' => 'nullable|string',
            'type' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'label.required' => 'Це поле мусить бути заповнене!',
            'label.string' => 'Данні повинні відповідати строковому типу!',
            'url.string' => 'Данні повинні відповідати строковому типу!',
            'type.required' => 'Це поле мусить бути заповнене!',
            'type.string' => 'Данні повинні відповідати строковому типу!',
        ];
    }
}
