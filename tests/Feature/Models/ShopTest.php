<?php

namespace Tests\Feature\Models;

use App\Models\Shop;
use Tests\TestCase;

class ShopTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->shop = Shop::create(['item_id' => 1, 'name' => 'hoge1', 'content' => 'hoge2']);
    }

    /**
     * Test Model
     */
    public function testModel()
    {
        // Insert
        $this->assertNotNull($this->shop);
        $this->assertIsInt($this->shop->id);

        // Update
        $this->shop->name = 'test';
        $result           = $this->shop->save();

        $this->assertTrue($result);

        // Select
        $fetchedShop = Shop::where('name', $this->shop->name)->first();

        $this->assertSame($this->shop->name, $fetchedShop->name);
    }

    /**
     * Test SoftDeletes
     */
    public function testSoftDeletes()
    {
        $this->shop->delete();

        // soft deleted
        $foundShop = Shop::find($this->shop->id);
        $this->assertNull($foundShop);

        // trashed object
        $trashedShop = Shop::withTrashed()->find($this->shop->id);
        $this->assertSame($this->shop->id, $trashedShop->id);

        // soft delete flags
        $this->assertNotNull($trashedShop->deleted_at);

        // restore Shop
        $this->shop->restore();
        $this->assertFalse($this->shop->trashed());

        // force delete Shop
        $this->shop->forceDelete();
        $remainingShops = Shop::all();
        $this->assertEmpty($remainingShops);
    }
}
