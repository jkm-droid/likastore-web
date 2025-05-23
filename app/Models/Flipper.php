<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flipper extends Model
{
    use HasFactory;

    protected $fillable = [
        'poster_name', 'image', 'poster_url'
    ];
}
