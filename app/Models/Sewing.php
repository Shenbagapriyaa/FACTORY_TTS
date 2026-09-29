<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewing extends Model
{
    use HasFactory;

    protected $fillable = [
        'sewing_no',
        'bundle_no',
        'cutting_no',
        'so_no',
        'item_no',
        'size',
        'bundle_quantity',
        'input_quantity',
        'output_quantity',
        'rejected_quantity',
        'line_no',
        'operator_name',
        'production_stage',
        'sewing_date',
        'status',
        'remarks',
    ];

    protected $casts = [
        'bundle_quantity' => 'integer',
        'input_quantity' => 'integer',
        'output_quantity' => 'integer',
        'rejected_quantity' => 'integer',
        'sewing_date' => 'date',
    ];
}