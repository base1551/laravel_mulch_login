<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
            'game_date' => 'required|date',
            'first_team_name' => 'required|string',
            'second_team_name' => 'required|string',
            'first_team_score' => 'required|int',
            'second_team_score' => 'required|int',
        ];
    }

    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'game_date' => '試合日付',
            'first_team_name' => '先攻チーム名',
            'first_team_score' => '先攻チーム得点',
            'second_team_name' => '後攻チーム',
            'second_team_score' => '後攻チーム得点'
        ];
    }

    /**
     * バリデーションメッセージ
     * @return array
     */
    public function messages()
    {
        return [
//            'game_date.required' => ':attributeを入力してください。',
//            'first_team_name.max' => ':attributeは30文字以下で入力してください。',
//            'user_name.required' => ':attributeを入力してください。',
//            'user_name.max' => ':attributeは30文字以下で入力してください。',
//            'about_text.required' => ':attributeを入力してください。',
//            'password.required' => ':attributeを入力してください。'
        ];
    }

}
