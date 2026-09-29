<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'so_no',
        'item_no',
        'order_date',
        'customer_name',
        'quantity',
        'unit',
        'size_ratio',
        'delivery_date',
        'status',
        'remarks',
    ];

    protected $casts = [
        'order_date' => 'date',
        'delivery_date' => 'date',
        'quantity' => 'decimal:2',
    ];
}