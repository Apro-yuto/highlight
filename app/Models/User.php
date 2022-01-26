<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * itemsを取得
     */
    public function items()
    {
        return $this->hasMany(User::class);
    }

    /**
     * brandsを取得
     */
    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

    /**
     * categoriesを取得
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * shopsを取得
     */
    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    /**
     * suppliersを取得
     */
    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }

    /**
     * baseTemplatesを取得
     */
    public function baseTemplates()
    {
        return $this->hasMany(BaseTemplate::class);
    }
}
