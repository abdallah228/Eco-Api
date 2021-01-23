<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            //
            'name'=>'required|unique:products,name',
            'details'=>'required',
            'stock'=>'required',
            'price'=>'required',
            'discount'=>'required',
        ];
    }
    public function messages()
    {
        return [
        'name.required'=>'ادخل الاسم',
        'name.unique'=>'هذا الاسم موجود من قبل',
        'details.required'=>'ادخل تفاصيل المنتج',
        'stock.required'=>'ادخل عدد المنتجات المتوفره',
        'price.required'=>'ادخل السعر',
        'discount.required'=>'ادخل الخصم',
        ];
    }
}
