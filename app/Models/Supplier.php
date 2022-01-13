<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'suppliers';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'item_id',
        'name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'comment',
        'created_at',
        'updated_at',
    ];

    /**
     * userを取得
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * itemsを取得
     */
    public function items()
    {
        return $this->belongsTo(Item::class);
    }
}
