<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class DeleteCourseRequest extends FormRequest
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
            'id' => 'bail|required',
            'type' => 'bail|required',
        ];
    }


    public function messages()
    {
        return [
            'id.required' => '参数不完整',
            'type.required' => '参数不完整',
        ];
    }
}
