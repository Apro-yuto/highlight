<?php

namespace Tests\Feature\Actions\Item;

use App\Actions\Item\DeleteItem;
use App\Models\Item;
use App\Models\User;
use Tests\TestCase;

class DeleteItemTest extends TestCase
{
    public function testDeleteItem()
    {
        $user = User::factory()->create();
        $item = Item::factory()->create(['user_id' => $user->id]);
        app(DeleteItem::class)->execute($item->id);

        $this->assertSoftDeleted('items', ['id' => $item->id]);
    }
}
