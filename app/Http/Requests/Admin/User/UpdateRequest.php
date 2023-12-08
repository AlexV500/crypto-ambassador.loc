<?php

namespace App\Http\Requests\Admin\User;

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
            'email' => 'required|email|unique:users,email,'.$this->user->id,
//            'password' => 'required|string',
//            'user_id' => 'required|integer|exists:users,id',
            'role' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Це поле мусить бути заповнене!',
            'name.string' => 'Данні повинні відповідати строковому типу!',
            'email.required' => 'Це поле мусить бути заповнене!',
            'email.string' => 'Данні повинні відповідати строковому типу!',
            'email.email' => 'Данні повинні відповідати формату mail@some.domain',
            'email.unique' => 'Користувач з таким email вже існує!',
        ];
    }
}
