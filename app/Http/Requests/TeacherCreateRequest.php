<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherCreateRequest extends FormRequest
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
            'name_uz' => 'required|string|max:300|min:5|unique:teachers',
            'name_ru' => 'required|string|max:300|min:5|unique:teachers',
            'name_en' => 'required|string|max:300|min:5|unique:teachers',
            'information_uz' => 'nullable',
            'information_ru' => 'nullable',
            'information_en' => 'nullable',
            'position_uz' => 'nullable',
            'position_ru' => 'nullable',
            'position_en' => 'nullable',
            'image' => 'nullable|string',
        ];
    }
}
