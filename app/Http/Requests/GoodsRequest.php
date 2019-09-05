<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GoodsRequest extends FormRequest
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
            'category'  => 'required',
            'image'     => 'required|image',
            'price'     => 'required|numeric',
            'stock'     => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required'      => 'Nama harus diisi',
            'category.required'  => 'Kategori harus diisi',
            'price.required'     => 'Harga harus diisi',
            'stock.required'     => 'Stok harus diisi',
            'image.required'     => 'Gambar harus diisi',
        ];

    }
}
