<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    use HasFactory;

    protected $fillable = [
        'drink_name',
        'drink_price',
        'drink_category',
        'drink_description',
        'poster_url',
        'image',
        'image_name'
    ];
}
