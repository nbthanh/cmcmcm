<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\models\Category;

class AdminRequest extends FormRequest
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
            'txtCatname'   => 'required|unique:categories,name',
            'txtCatalias'  => 'required',
            'txtCatparent' => 'integer|min:0',
            'txtCatorder'  => 'integer|min:0',
        ];
    }

    public function messages() {
        return [
            'txtCatname.required'  => 'Vui lòng nhập tên thể loại',
            'txtCatname.unique'    => 'Tên thể loại đã tồn tại',
            'txtCatparent.integer' => 'Parent error',     
            'txtCatparent.min'     => 'Parent error',
            'txtCatorder.integer'  => 'Thứ tự phải là số nguyên',     
            'txtCatorder.min'      => 'Thứ tự phải dương',
            'txtCatalias.required' => 'Vui lòng nhập url'
        ];
    }
}
