<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Washing extends Model
{
    use HasFactory;

    protected $fillable = [
        'washing_no',
        'sewing_no',
        'bundle_no',
        'so_no',
        'item_no',
        'size',
        'process_type',
        'input_quantity',
        'output_quantity',
        'rejected_quantity',
        'washing_machine',
        'operator_name',
        'process_date',
        'status',
        'remarks',
    ];

    protected $casts = [
        'input_quantity' => 'integer',
        'output_quantity' => 'integer',
        'rejected_quantity' => 'integer',
        'process_date' => 'date',
    ];
}