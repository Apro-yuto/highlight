<?php

namespace App\Actions\Item;

use App\Models\Item;
use Illuminate\Database\Eloquent\Builder;

class GetItems
{
    /**
     * 商品一覧を取得
     *
     * @param int $userId ユーザーID
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function execute(int $userId): Builder
    {
        return Item::where('user_id', $userId);
    }
}
