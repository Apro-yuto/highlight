<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseTemplate extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'base_templates';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'content_head',
        'content_end',
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
}
