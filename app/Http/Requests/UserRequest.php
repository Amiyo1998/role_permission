<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
        return [
            'name'=>[
                'required',
                'max:50',
            ],
            'email'=>[
                'required',
                Rule::unique('users')->ignore($this->route('user')),
                'max:50',
            ],
            'password'=>[
                'nullable',
                'confirmed',
                'min:6',
                'max:16',
            ],
        ];
    }
}
