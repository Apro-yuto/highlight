<?php

namespace App\Http\Controllers;

use App\Actions\Item\GetItems;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ItemController extends Controller
{
    public function index(GetItems $action)
    {
        $data = $action->execute();
        $user = Auth::user();
        $props = [
            'data' => $data,
            'user' => $user,
        ];

        return Inertia::render(
            'Item/Index',
            $props
        );
    }
}
