<?php

namespace Tests\Feature\Actions\Item;

use App\Actions\Item\GetItems;
use App\Models\Item;
use App\Models\User;
use Tests\TestCase;

class GetItemsTest extends TestCase
{
    public function testGetItems()
    {
        $user = User::factory()->create();
        Item::factory()->create(['user_id' => $user->id]);
        $items = app(GetItems::class)->execute($user->id);

        $this->assertArrayHasKey('user_id', $items[0]);
        $this->assertArrayHasKey('brand_id', $items[0]);
        $this->assertArrayHasKey('color_id', $items[0]);
        $this->assertArrayHasKey('category_id', $items[0]);
        $this->assertArrayHasKey('shop_id', $items[0]);
        $this->assertArrayHasKey('status_id', $items[0]);
        $this->assertArrayHasKey('supplier_id', $items[0]);
        $this->assertArrayHasKey('name', $items[0]);
        $this->assertArrayHasKey('gender', $items[0]);
        $this->assertArrayHasKey('img_url', $items[0]);
        $this->assertArrayHasKey('purchase_price', $items[0]);
        $this->assertArrayHasKey('selling_price', $items[0]);
        $this->assertArrayHasKey('template', $items[0]);
    }
}
