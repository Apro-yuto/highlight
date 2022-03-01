<?php

namespace Tests\Feature\Models;

use App\Models\Item;
use Tests\TestCase;

class ItemTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->item = Item::create([
            'user_id'        => 1,
            'brand_id'       => 1,
            'name'           => 'hoge1',
            'color_id'       => 1,
            'shop_id'        => 1,
            'supplier_id'    => 1,
            'img_url'        => 'hoge.jpg',
            'gender'         => 1,
            'purchase_price' => 1,
            'selling_price'  => 1,
            'template'       => 'hoge1',
        ]);
    }

    /**
     * Test Model
     */
    public function testModel()
    {
        // Insert
        $this->assertNotNull($this->item);
        $this->assertIsInt($this->item->id);

        // Update
        $this->item->name = 'test';
        $result           = $this->item->save();

        $this->assertTrue($result);

        // Select
        $fetchedItem = Item::where('name', $this->item->name)->first();

        $this->assertSame($this->item->name, $fetchedItem->name);
    }

    /**
     * Test SoftDeletes
     */
    public function testSoftDeletes()
    {
        $this->item->delete();

        // soft deleted
        $foundItem = Item::find($this->item->id);
        $this->assertNull($foundItem);

        // trashed object
        $trashedItem = Item::withTrashed()->find($this->item->id);
        $this->assertSame($this->item->id, $trashedItem->id);

        // soft delete flags
        $this->assertNotNull($trashedItem->deleted_at);

        // restore Item
        $this->item->restore();
        $this->assertFalse($this->item->trashed());

        // force delete Item
        $this->item->forceDelete();
        $remainingItems = Item::all();
        $this->assertEmpty($remainingItems);
    }
}
