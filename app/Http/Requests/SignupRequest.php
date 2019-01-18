<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest {

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
        if ($this->pass == 'add') {
            $required = '|required';
            $unique = '|unique:users,email';
            $length = 'min:6|max:12';
        } else {
            $required = '';
            $unique = '';
            $length = '';
        }
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email|required' . $unique,
            'password' => $length . $required,
        ];
    }

}
