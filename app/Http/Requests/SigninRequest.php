<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SigninRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'email' => 'email|required',
            'password' => 'required|min:6|max:12',
        ];
    }

//    public function messages() {
//    /////custom error messages
//        return[
//            'email.required' => 'Электронный адрес обязателен',
//            'email.email' => 'Электронный адрес должен быть настоящим'
//        ];
//    }

}
