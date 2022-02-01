<?php

namespace App\Actions\Item;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class GetItems
{
    public function execute()
    {
        $user = $user = Auth::user();

        return Item::where('user_id', $user->id)->get();
    }
}
