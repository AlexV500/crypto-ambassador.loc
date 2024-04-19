<?php

namespace App\Http\Requests\Admin\Menu\MenuItem;

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
            'label' => 'required|string',
            'menu_widget_id' => 'required|integer',
            'menu_item_bind_type' => 'required|string',
            'menu_item_type' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'label.required' => 'Це поле мусить бути заповнене!',
            'label.string' => 'Данні повинні відповідати строковому типу!',
            'menu_item_bind.required' => 'Це поле мусить бути заповнене!',
            'menu_item_bind.string' => 'Данні повинні відповідати строковому типу!',
            'menu_item_type.string' => 'Данні повинні відповідати строковому типу!',
        ];
    }
}
