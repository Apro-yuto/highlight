<?php

namespace App\Actions\Item;

use App\Models\Item;

class UpdateItem
{
    /**
     * 商品を保存
     *
     * @param int   $id     商品ID
     * @param array $inputs リクエスト
     * @return App\Models\Item
     */
    public function execute(int $id, array $inputs = []): Item
    {
        $item = Item::find($id);
        $item->update($inputs);

        return $item;
    }
}
