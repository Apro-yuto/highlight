<?php

namespace App\Http\Controllers;

use App\Actions\Item\DeleteItem;
use App\Actions\Item\GetItems;
use App\Actions\Item\StoreItem;
use App\Actions\Item\UpdateItem;
use App\Http\Requests\Item\ItemRequest;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ItemController extends Controller
{
    /**
     * 商品一覧ページを表示
     *
     * @param App\Actions\Item\GetItems $action
     */
    public function index(GetItems $action): Response
    {
        $user  = Auth::user();
        $data  = $action->execute($user->id)->get();
        $props = [
            'data' => $data,
            'user' => $user,
        ];

        return Inertia::render(
            'Item/Index',
            $props
        );
    }

    /**
     * 商品詳細ページを表示
     *
     * @param int $id 商品のID
     */
    public function detail(int $id): Response
    {
        $props = ['item' => Item::find($id)];

        return Inertia::render(
            'Item/Detail',
            $props
        );
    }

    /**
     * 商品作成ページを表示
     */
    public function create(): Response
    {
        return Inertia::render('Item/Create');
    }

    /**
     * 商品を保存する
     *
     * @param App\Actions\Item\StoreItem         $action
     * @param App\Http\Requests\Item\ItemRequest $request
     * @return void
     */
    public function store(StoreItem $action, ItemRequest $request)
    {
        $action->execute($request->all());
    }

    /**
     * 商品を更新する
     *
     * @param App\Actions\Item\UpdateItem        $action
     * @param App\Http\Requests\Item\ItemRequest $request
     * @return void
     */
    public function update(UpdateItem $action, ItemRequest $request)
    {
        $action->execute($request->id, $request->all());
    }

    /**
     * 商品を削除する
     *
     * @param App\Actions\Item\DeleteItem $action
     * @param int                         $id     商品のID
     * @return Illuminate\Http\RedirectResponse
     */
    public function destroy(DeleteItem $action, int $id): RedirectResponse
    {
        $action->execute($id);

        return Redirect::route('item.index');
    }
}
