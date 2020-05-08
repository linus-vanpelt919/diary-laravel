<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {/**
     * 認証関係の判定を行う場合はここに処理を記述する。
     * 特にない場合は常にtrueを返しておく。
     */
        return true;//trueにする
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {//diary作成時・編集時のバリデーション
        return [
            'title'=>'required|max:255|string',
            'detail'=>'required|max:500|string',
            'pic'=>'nullable|mimes:jpeg,png,jpg|file|image',
            'category_id'=>'required|integer'//0はダメにするなど必要？
            //dimensionsでサイズを指定、ハッシュ化など
        ];
    }
}
