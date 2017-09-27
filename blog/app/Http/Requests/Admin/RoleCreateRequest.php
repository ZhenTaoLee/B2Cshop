<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoleCreateRequest extends FormRequest
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
            "role_name" => 'required',
            'describe' => 'required',
            'power' => 'required',

        ];
    }
    public function messages()
    {
        return [
           'role_name.required' => '请输入角色名称',
           'describe.required' => '请填写描述',
           'power.required' => '请选择权限',
        ];
    }
}
