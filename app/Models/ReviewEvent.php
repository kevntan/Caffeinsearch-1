<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewEvent extends Model
{
    use HasFactory;
    protected $fillable = [
        'komentar',
        'user_id',
        'event_id',
        'created_at',
        'updated_at',
    ];
}
