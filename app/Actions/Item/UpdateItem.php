<?php

namespace App\Actions\Item;

use App\Models\Item;

class UpdateItem
{
    public function execute(Item $item, array $inputs = []): Item
    {
        $item->update($inputs);

        return $item->refresh();
    }
}
