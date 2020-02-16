<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLearnRequest extends FormRequest
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
            'association_id' => 'required',
            'learning_objectives' => 'bail|required|max:300',
        ];
    }

        public function messages()
    {
        return [
            'association_id.required' => '参数不完整',
            'learning_objectives.max' => '学习目标不能超过300个字符',
            'learning_objectives.required' => '学习目标不得为空',
        ];

    }
}
