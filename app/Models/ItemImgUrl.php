<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemImgUrl extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'item_img_urls';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'item_id',
        'url',
        'content',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * itemを取得
     */
    public function item()
    {
        return $this->belongsTo(Item::class, 'id', 'item_id');
    }
}
