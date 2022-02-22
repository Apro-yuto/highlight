<?php

namespace App\Actions\Item;

use App\Models\Item;

class DeleteItem
{
    /**
     * 商品を削除する
     *
     * @param int $id 商品ID
     * @return void
     */
    public function execute($id)
    {
        $item = Item::find($id);
        $item->delete();
    }
}
