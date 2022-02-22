<?php

namespace Tests\Feature\Actions\Item;

use App\Actions\Item\StoreItem;
use App\Models\Item;
use Tests\TestCase;

class StoreItemTest extends TestCase
{
    public function testStoreItem()
    {
        $data = Item::factory()->make()->toArray();

        app(StoreItem::class)->execute($data);

        $this->assertDatabaseHas('items', $data);
    }
}
