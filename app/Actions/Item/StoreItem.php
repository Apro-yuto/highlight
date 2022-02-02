<?php

namespace App\Actions\Item;

use App\Models\Item;

class StoreItem
{
    public function execute(array $inputs = [])
    {
        return Item::create($inputs);
    }
}
