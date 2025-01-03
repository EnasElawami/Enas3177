<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'status',
    ];

    // علاقة مع المستخدم (User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // علاقة مع المنتجات (Products)
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
