<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdministratorAddRequest extends FormRequest
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
            'username' => 'required|max:16',
            'pwd' => 'required|min:6',
            'pwd2' => 'required',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
           'username.required' => '管理员名称不能为空',
           'username.max' => '管理员名称过长',
           'email.required' => '邮箱不能为空',
           'email.email' => '邮箱格式不正确',
           'pwd.required' => '密码不能为空',
           'pwd.min' => '密码长度最少6位',
           'pwd2.required' => '确认密码不能为空',

        ];
    }
}
