<?php

namespace App\Actions\Item;

use App\Models\Item;

class DeleteItem
{
    public function execute(Item $item)
    {
        $item->delete();
    }
}
