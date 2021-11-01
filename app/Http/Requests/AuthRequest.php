<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
        $isLogout = request()->exists('id');
        $isLogin = request()->exists(array('email', 'password'));
        $isRegister = request()->exists(array('name', 'email', 'password'));


        // register validation
        if ($isRegister) {
            return [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required'
            ];
        }

        // login validation
        if ($isLogin) {
            return [
                'email' => 'required',
                'password' => 'required'
            ];
        }

        // logout validation
        if ($isLogout) {
            return [
                'id' => 'required'
            ];
        }

        
    }


    public function messages()
    {
        return [
            'id.required' => 'User id required',
            'email.required' => 'Email is required!',
            'name.required' => 'Name is required!',
            'password.required' => 'Password is required!'
        ];
    }
}
