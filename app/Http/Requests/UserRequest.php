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
        $isUpdateProfile = request()->exists(array('name', 'address', 'phone'));
        $isUpdatePhoto = request()->exists('photo');

        if($isUpdateProfile){
            return [
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required'
            ];
        }

        if($isUpdatePhoto){
            return [
                'photo' => 'required'
            ];
        }
    }


    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'address.required' => 'Address is required!',
            'phone.required' => 'Phone is required!',
            'photo.required' => 'Photo url is required'
        ];
    }
}
