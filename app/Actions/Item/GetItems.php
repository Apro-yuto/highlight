<?php

namespace App\Actions\Item;

use App\Models\Item;

class GetItems
{
    public function execute(int $userId)
    {
        return Item::where('user_id', $userId)->get();
    }
}
