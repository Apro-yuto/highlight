<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'statuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [
        'name',
        'error_flag',
        'comment',
    ];

    /**
     * itemsを取得
     */
    public function items()
    {
        return $this->belongsTo(Item::class, 'status_id', 'id');
    }
}