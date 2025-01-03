<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id',
    ];

    // علاقة مع التصنيف (Category)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // علاقة مع السلة (Cart)
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // علاقة مع الطلبات (Orders)
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}