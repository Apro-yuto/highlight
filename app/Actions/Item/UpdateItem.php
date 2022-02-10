<?php

namespace App\Actions\Item;

use App\Models\Item;

class UpdateItem
{
    public function execute(int $id, array $inputs = []): Item
    {
        $item = Item::find($id);
        $item->update($inputs);

        return $item->refresh();
    }
}
