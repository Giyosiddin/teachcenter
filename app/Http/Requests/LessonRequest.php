<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'body' => 'required',
            'course_id' => 'required|numeric|nullable',
            'teacher_id' => 'numeric|nullable',
            'locale' => 'required|string|max:3|nullable',
            'time' => 'string',
            'video' => 'string',
        ];
    }
}
