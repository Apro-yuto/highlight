<?php

namespace App\Actions\Item;

use App\Models\Item;

class DeleteItem
{
    public function execute($id)
    {
        $item = Item::find($id);
        $item->delete();
    }
}
