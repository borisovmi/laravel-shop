<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest {

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
        if ($this->op == 'add') {
            $unique = '|unique:categories,url';
            $required = '|required';
        } else {
            $unique = '';
            $required = '';
        }
        return [
            'title' => 'required',
            'article' => 'required',
            'price' => 'required',
            'url' => 'required|regex:/^[^\s]+$/' . $unique,
            'image' => 'image' . $required,
        ];
    }

}
