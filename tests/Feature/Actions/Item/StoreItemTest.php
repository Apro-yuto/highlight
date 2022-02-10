<?php

namespace Tests\Feature\Actions\Item;

use App\Actions\Item\StoreItem;
use App\Models\Item;
use Tests\TestCase;

class StoreItemTest extends TestCase
{
    public function testStoreItem()
    {
        $data = [
            'user_id'        => 1,
            'name'           => 'HogeHoge',
            'gender'         => 1,
            'purchase_price' => 1000,
            'selling_price'  => 2000,
        ];
        app(StoreItem::class)->execute($data);

        $storedItem = Item::where('name', 'HogeHoge')->first();
        $this->assertEquals(1, $storedItem->user_id);
        $this->assertEquals(1, $storedItem->gender);
        $this->assertEquals(1000, $storedItem->purchase_price);
        $this->assertEquals(2000, $storedItem->selling_price);
    }
}
