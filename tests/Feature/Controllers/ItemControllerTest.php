<?php

namespace Tests\Feature\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\Assert;
use Tests\TestCase;

class ItemControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    public function testIndex()
    {
        $testIndexItem = [
            'user_id'        => $this->user->id,
            'name'           => 'testIndexItem',
            'gender'         => 1,
            'purchase_price' => 1000,
            'selling_price'  => 2000,
        ];
        $item = Item::factory()->create($testIndexItem);

        // GET リクエスト
        $response = $this->get(route('item.index'));

        // レスポンスの検証
        $response->assertOk()  // ステータスコードが 200
            ->assertInertia(fn (Assert $page) => $page
                ->url('/item'));

        $response->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->url('/item')
                ->has('data', fn (Assert $page) => $page
                    ->has('0', fn (Assert $page) => $page
                        ->where('id', $item->id)
                        ->where('user_id', $item->user_id)
                        ->where('name', $item->name)
                        ->where('gender', $item->gender)
                        ->where('purchase_price', $item->purchase_price)
                        ->where('selling_price', $item->selling_price)
                        ->etc()))
                ->has('user', fn (Assert $page) => $page
                    ->where('id', $this->user->id)
                    ->where('name', $this->user->name)
                    ->where('email', $this->user->email)
                    ->etc()));
    }

    public function testDetail()
    {
        $testDetailItem = [
            'user_id'        => $this->user->id,
            'name'           => 'testDetailItem',
            'gender'         => 1,
            'purchase_price' => 1000,
            'selling_price'  => 2000,
        ];
        $item     = Item::factory()->create($testDetailItem);
        $response = $this->get(route('item.detail', $item->id));

        // レスポンスの検証
        $url = '/item/detail/' . $item->id;
        $response->assertOk()  // ステータスコードが 200
            ->assertInertia(fn (Assert $page) => $page
                ->url($url));
    }

    public function testCreate()
    {
        $response = $this->get(route('item.create'));

        // レスポンス検証
        $response->assertOk() // ステータスコードが 200
            ->assertInertia(fn (Assert $page) => $page
                ->url('/item/create'));
    }

    public function testStore()
    {
        $item = Item::factory()->make()->toArray();

        // POST リクエスト
        $response = $this->post(route('item.store'), $item);

        // レスポンス検証
        $response->assertOk();
        $this->assertDatabaseHas('items', $item);
    }

    public function testUpdate()
    {
        $item = Item::factory()->create([
            'user_id'        => $this->user->id,
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

        // PUTリクエスト
        $response = $this->put(route('item.update', ['id' => $item->id]), $expectedItem);

        // レスポンス検証
        $response->assertOk();
        $this->assertDatabaseHas('items', $expectedItem);
    }

    public function testDestroy()
    {
        $testDestroyItem = [
            'user_id'        => $this->user->id,
            'name'           => 'testDestroyItem',
            'gender'         => 1,
            'purchase_price' => 1000,
            'selling_price'  => 2000,
        ];
        $item = Item::factory()->create($testDestroyItem);

        // DELETE リクエスト
        $response = $this->delete(route('item.destroy', $item->id));

        // レスポンス検証
        $response->assertRedirect('/item');
        $this->assertSoftDeleted('items', ['id' => $item->id]);
    }
}
