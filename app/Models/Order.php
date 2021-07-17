<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'phone_number',
        'location',
        'payment_method',
        'total_price',
        'drinks',
        'order_status',
        'paid',
        'payment_code'
    ];
}
