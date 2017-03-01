<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $postId = $this->route()->parameter('id');
        return [
            'txtEmail' => 'required|email',
            'txtUserName' => 'required|unique:users,username,'. $postId,
            'txtPass' => 'required|min:8',
            'txtPassAgain' => 'required|same:txtPass'
        ];
    }

    public function messages() {
        return [
            'txtEmail.required' => 'Bạn chưa nhập email',
            'txtEmail.email' => 'Email không hợp lệ',
            'txtUserName.required' => 'Bạn chưa nhập username',
            'txtUserName.unique' => 'Username đã tồn tại',
            'txtPass.required' => 'Bạn chưa nhập password',
            'txtPassAgain.min' => 'Password ngắn',
            'txtPassAgain.required' => 'Bạn chưa xác nhận lại password',
            'txtPassAgain.same' => 'Xác nhận password chưa khớp'
        ];
    }
}
