<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required',
            'email'     => 'required|email',
            'password'  => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Nama harus diisi',
            'email.required'    => 'Email harus diisi',
            'email.email'       => 'Alamat email tidak benar',
            'email.unique'      => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min'      => 'Password minimal 6 karakter'
        ];

    }
}
