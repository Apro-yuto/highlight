<?php

namespace Tests\Feature\Actions\Item;

use App\Actions\Item\UpdateItem;
use App\Models\Item;
use Tests\TestCase;

class UpdateItemTest extends TestCase
{
    public function testUpdateItem()
    {
        $item = Item::factory()->create([
            'user_id'        => 1,
            'status_id'      => 1,
            'name'           => 'ItemBeforeUpdate',
            'gender'         => 1,
            'purchase_price' => 1000,
            'selling_price'  => 1000,
        ]);

        $expectedItem = [
            'id'             => $item->id,
            'user_id'        => $item->user_id,
            'status_id'      => 1,
            'name'           => 'ItemAfterUpdate',
            'gender'         => 2,
            'purchase_price' => 2000,
            'selling_price'  => 2000,
        ];

        app(UpdateItem::class)->execute($item->id, $expectedItem);

        $this->assertDatabaseHas('items', $expectedItem);
    }
}
