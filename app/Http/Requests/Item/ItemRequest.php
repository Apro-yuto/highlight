<?php

namespace App\Http\Requests\Item;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'user_id'        => 'ユーザーID',
            'brand_id'       => 'ブランドID',
            'color_id'       => 'カラーID',
            'category_id'    => 'カテゴリID',
            'shop_id'        => '販売先ID',
            'status_id'      => 'ステータスID',
            'supplier_id'    => '購入元ID',
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
            'user_id'        => ['required', 'integer'],
            'brand_id'       => ['nullable', 'integer'],
            'color_id'       => ['nullable', 'integer'],
            'category_id'    => ['nullable', 'integer'],
            'shop_id'        => ['nullable', 'integer'],
            'status_id'      => ['required', 'integer'],
            'supplier_id'    => ['nullable', 'integer'],
            'name'           => ['required', 'max:20', 'string'],
            'gender'         => ['required', 'integer'],
            'img_url'        => ['nullable', 'string'],
            'purchase_price' => ['required', 'integer'],
            'selling_price'  => ['required', 'integer'],
            'template'       => ['nullable', 'string'],
        ];
    }
}
