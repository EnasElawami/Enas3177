<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engineer extends Model
{
    use HasFactory;

    // الحقول القابلة للتعبئة
    protected $fillable = [
        'name',
        'email',
        'password',
        'city',
        'field',
        'about',
        'personal_photo',
        'uploaded_pictures',
    ];
}