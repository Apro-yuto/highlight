<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'colors';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [
        'name',
        'code',
        'comment',
    ];

    /**
     * itemsを取得
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'color_item', 'color_id', 'item_id');
    }
}
