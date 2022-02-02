<?php

namespace App\Http\Requests\Item;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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

    public function attributes()
    {
        return [
            'name'           => '商品名',
            'gender'         => '性別',
            'img_url'        => '画像url',
            'purchase_price' => '仕入れ値(税込)',
            'selling_price'  => '売値(税込)',
            'template'       => 'テンプレート文章',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'           => 'required|max: 20|string',
            'gender'         => 'required|integer',
            'img_url'        => 'nullable|string',
            'purchase_price' => 'required|integer',
            'selling_price'  => 'required|integer',
            'template'       => 'nullable|string',
        ];
    }
}
