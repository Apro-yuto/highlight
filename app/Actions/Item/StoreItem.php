<?php

namespace App\Actions\Item;

use App\Models\Item;

class StoreItem
{
    /**
     * 商品を保存
     *
     * @param array $inputs リクエスト
     * @return App\Models\Item
     */
    public function execute(array $inputs = []): Item
    {
        return Item::create($inputs);
    }
}
