<?php

namespace Tests\Feature\Actions\Item;

use App\Actions\Item\GetItems;
use App\Models\User;
use Tests\TestCase;

class GetItemsTest extends TestCase
{
    public function testGetItems()
    {
        $user = User::factory()->create();

        $expectedSql      = 'select * from "items" where "user_id" = ? and "items"."deleted_at" is null';
        $expectedBindings = [0 => $user->id];

        $result = app(GetItems::class)->execute($user->id);

        $this->assertSame($expectedSql, $result->toSql());
        $this->assertSame($expectedBindings, $result->getBindings());
    }
}
