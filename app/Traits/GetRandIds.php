<?php

namespace App\Traits;

use App\Models\Color;
use App\Models\Item;
use App\Models\Status;
use App\Models\User;

trait GetRandIds
{
    public function getRandUserId()
    {
        $userIds = User::all()->pluck('id')->toArray();
        $key     = array_rand($userIds, 1);

        return $userIds[$key];
    }

    public function getRandItemId()
    {
        $itemIds = Item::all()->pluck('id')->toArray();
        $key     = array_rand($itemIds, 1);

        return $itemIds[$key];
    }

    public function getRandColorId()
    {
        $colorIds = Color::all()->pluck('id')->toArray();
        $key      = array_rand($colorIds, 1);

        return $colorIds[$key];
    }

    public function getRandStatusId()
    {
        $statusIds = Status::all()->pluck('id')->toArray();
        $key       = array_rand($statusIds, 1);

        return $statusIds[$key];
    }
}
