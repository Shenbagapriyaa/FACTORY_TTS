<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packing extends Model
{
    use HasFactory;

    protected $fillable = [
        'packing_no',
        'finishing_no',
        'bundle_no',
        'so_no',
        'item_no',
        'size',
        'input_quantity',
        'packed_quantity',
        'rejected_quantity',
        'packing_type',
        'operator_name',
        'packing_date',
        'status',
        'remarks',
    ];

    protected $casts = [
        'input_quantity' => 'integer',
        'packed_quantity' => 'integer',
        'rejected_quantity' => 'integer',
        'packing_date' => 'date',
    ];
}