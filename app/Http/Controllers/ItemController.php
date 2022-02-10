<?php

namespace App\Http\Controllers;

use App\Actions\Item\DeleteItem;
use App\Actions\Item\GetItems;
use App\Actions\Item\StoreItem;
use App\Actions\Item\UpdateItem;
use App\Http\Requests\Item\StoreItemRequest;
use App\Http\Requests\Item\UpdateItemRequest;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ItemController extends Controller
{
    public function index(GetItems $action)
    {
        $user  = Auth::user();
        $data  = $action->execute($user->id);
        $props = [
            'data' => $data,
            'user' => $user,
        ];

        return Inertia::render(
            'Item/Index',
            $props
        );
    }

    public function detail(int $id)
    {
        $props = ['item' => Item::find($id)];

        return Inertia::render(
            'Item/Detail',
            $props
        );
    }

    public function create()
    {
        return Inertia::render('Item/Create');
    }

    public function edit(Item $item)
    {
        $props = ['item' => $item];

        return Inertia::render(
            'Item/Edit',
            $props
        );
    }

    public function store(StoreItem $action, StoreItemRequest $request)
    {
        $action->execute($request->all());
    }

    public function update(UpdateItem $action, UpdateItemRequest $request)
    {
        $action->execute($request->all(), $request->id);
    }

    public function destroy(DeleteItem $action, int $id)
    {
        $action->execute($id);

        return Redirect::route('item.index');
    }
}
