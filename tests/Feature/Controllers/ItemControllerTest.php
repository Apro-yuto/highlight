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
        $this->data = [
            'user_id'        => 1,
            'name'           => 'Hoge',
            'gender'         => 1,
            'purchase_price' => 1000,
            'selling_price'  => 2000,
        ];
    }

    /**
     * GETリクエストで商品一覧が返ってくるか確認。
     *
     * @return void
     */
    public function testIndex()
    {
        // GET リクエスト
        $response = $this->get(route('item.index'));

        // レスポンスの検証
        $response->assertOk()  # ステータスコードが 200
            ->assertInertia(fn (Assert $page) => $page
                ->url('/item'));
    }

    /**
     * GETリクエストで商品詳細が返ってくるか確認。
     *
     * @return void
     */
    public function testDetail()
    {
        $item = Item::factory()->create($this->data);
        $response = $this->get(route('item.detail', $item->id));

        // レスポンスの検証
        $url = '/item/detail/' . $item->id;
        $response->assertOk()  # ステータスコードが 200
            ->assertInertia(fn (Assert $page) => $page
                ->url($url));
    }

    /**
     * GETリクエストで新規作成が返ってくるか確認。
     *
     * @return void
     */
    public function testCreate()
    {
        $response = $this->get(route('item.create'));

        // レスポンス検証
        // $response->assertOk(); # ステータスコードが 200

        $this->get(route('item.create'))
            ->assertInertia(fn (Assert $page) => $page
                ->url('/item/create'));
    }

    /**
     * POSTリクエストでデータが保存されるか確認。
     *
     * @return void
     */
    public function testStore()
    {
        $data = [
            'user_id'        => 1,
            'name'           => 'HogeHoge',
            'gender'         => 2,
            'purchase_price' => 2000,
            'selling_price'  => 4000,
        ];
        // POST リクエスト
        $response = $this->post(route('item.store'), $data);

        // レスポンス検証
        $response->assertOk(); # ステータスコードが 200
        $storedItem = Item::where('name', 'HogeHoge')->first();
        $this->assertEquals(1, $storedItem->user_id);
        $this->assertEquals(2, $storedItem->gender);
        $this->assertEquals(2000, $storedItem->purchase_price);
        $this->assertEquals(4000, $storedItem->selling_price);
    }

    /**
     * PUTリクエストでデータが更新されるか確認。
     *
     * @return void
     */
    public function testUpdate()
    {
        $item = Item::factory()->create();

        // PUTリクエスト
        $response = $this->put(route('item.update', ['id' => $item->id]), $this->data);

        // レスポンス検証
        $response->assertOk();
        $updatedItem = Item::where('id', $item->id)->first();
        $this->assertEquals(1, $updatedItem->user_id);
        $this->assertEquals('Hoge', $updatedItem->name);
        $this->assertEquals(1, $updatedItem->gender);
        $this->assertEquals(1000, $updatedItem->purchase_price);
        $this->assertEquals(2000, $updatedItem->selling_price);
    }

    /**
     * DELETEリクエストでデータが削除されるか確認。
     *
     * @return void
     */
    public function testDestroy()
    {
        $item = Item::factory()->create();

        // DELETE リクエスト
        $response = $this->delete(route('item.destroy', $item->id));

        // レスポンス検証
        $response->assertRedirect('/item');
        $this->assertSoftDeleted('items', ['id' => $item->id]);
    }
}
