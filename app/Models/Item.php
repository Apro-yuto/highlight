<?php

namespace App\Models;

use Faker\Provider\ar_SA\Color;
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
     * このモデルが使用するデータベース接続
     *
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'brand_id',
        'category_id',
        'color_id',
        'label_id',
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
     * brandを取得
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * categoryを取得
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * colorsを取得
     */
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_item');
    }

    /**
     * lableを取得
     */
    public function lable()
    {
        return $this->belongsTo(Lable::class);
    }

    /**
     * shopを取得
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * statusを取得
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * supplierを取得
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
