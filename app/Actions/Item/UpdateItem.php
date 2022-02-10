<?php

namespace App\Actions\Item;

use App\Models\Item;

class UpdateItem
{
    public function execute(array $inputs = [], $id): Item
    {
        $item = Item::find($id);
        $item->update($inputs);

        return $item->refresh();
    }
}
