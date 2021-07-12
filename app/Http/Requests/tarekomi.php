<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tarekomi extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //タレコミのバリデーションを作る
    public function rules()
    {
        return [
            //
            'name' => 'required|max:40',
            'subject' => 'required|max:80',
            'message' => 'required|max:10000',
        ];
    }
    //バリデーションメッセージ作成
    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'name.max' => '名前は40文字以内で入力してください',
            'subject.required' => '件名を入力してください',
            'subject.max' => '件名は80文字以内で入力してください',
            'message.required' => 'タレコミを入力してください',
            'message.max' => 'タレコミは10000文字以内で入力してください',
        ];
    }
}
