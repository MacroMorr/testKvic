<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:5|max:255',
            'description' => 'required|min:20',
        ];

    }

    public function messages()
    {
        return [
            'name.required' => 'Заполните название задачи',
            'name.min' => 'Минимальная длина названия задачи должна быть 5 символов',
            'name.max' => 'Максимальная длина описания задачи не должна превышать 255 символов',
            'description.required' => 'Заполните описание задачи',
            'description.min' => 'Минимальная длина описания задачи должна быть 20 символов',
        ];
    }
}
