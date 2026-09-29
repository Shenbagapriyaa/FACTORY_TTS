<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    use HasFactory;

    protected $fillable = [
        'bundle_no',
        'qr_code',
        'cutting_no',
        'marker_no',
        'so_no',
        'item_no',
        'size',
        'bundle_quantity',
        'bundle_date',
        'bundle_operator',
        'status',
        'remarks',
    ];

    protected $casts = [
        'bundle_date' => 'date',
        'bundle_quantity' => 'integer',
    ];
}