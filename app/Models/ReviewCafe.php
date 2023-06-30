<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewCafe extends Model
{
    use HasFactory;
    protected $fillable = [
        'rating',
        'komentar',
        'foto',
        'user_id',
        'cafe_id',
        'created_at',
        'updated_at',
    ];
}
