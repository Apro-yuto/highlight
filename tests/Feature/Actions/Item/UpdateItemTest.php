<?php

namespace Tests\Feature\Actions\Item;

use App\Actions\Item\UpdateItem;
use App\Models\Item;
use Tests\TestCase;

class UpdateItemTest extends TestCase
{
    public function testUpdateItem()
    {
        $item = Item::factory()->create();

        $data = [
            'user_id'        => 1,
            'name'           => 'HogeHoge',
            'gender'         => 1,
            'purchase_price' => 1000,
            'selling_price'  => 2000,
        ];
        app(UpdateItem::class)->execute($item->id, $data);

        $UpdatedItem = Item::where('id', $item->id)->first();
        $this->assertEquals('HogeHoge', $UpdatedItem->name);
        $this->assertEquals(1, $UpdatedItem->user_id);
        $this->assertEquals(1, $UpdatedItem->gender);
        $this->assertEquals(1000, $UpdatedItem->purchase_price);
        $this->assertEquals(2000, $UpdatedItem->selling_price);
    }
}
