<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'phone' => 'required|min:6|max:20|regex:"^[\d]*$"',
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Введите email',
            'email.email' => 'Неверный формат email',
            'phone.required' => 'Введите телефон',
            'phone.min' => 'Телефон должен содержать минимум 6 цифр',
            'phone.max' => 'Телефон должен содержать максимум 20 цифр',
            'phone.regex' => 'Телефон может содержать только цифры',
            'name.required' => 'Введите имя'
        ];
    }
}
