<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'brand_id',
        'color_id',
        'shop_id',
        'status_id',
        'supplier_id',
        'name',
        'gender',
        'img_url',
        'purchase_price',
        'selling_price',
        'template',
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
     * userを取得
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * brandを取得
     */
    public function brand()
    {
        return $this->hasOne(Brand::class);
    }

    /**
     * categoryを取得
     */
    public function category()
    {
        return $this->hasOne(Category::class);
    }

    /**
     * colorsを取得
     */
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_item', 'item_id', 'color_id');
    }

    /**
     * lableを取得
     */
    public function lables()
    {
        return $this->hasMany(Lable::class);
    }

    /**
     * shopを取得
     */
    public function shop()
    {
        return $this->hasOne(Shop::class);
    }

    /**
     * statusを取得
     */
    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    /**
     * supplierを取得
     */
    public function supplier()
    {
        return $this->hasOne(Supplier::class);
    }
}
