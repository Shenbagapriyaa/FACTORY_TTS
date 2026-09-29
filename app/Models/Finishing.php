<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finishing extends Model
{
    use HasFactory;

    protected $fillable = [
        'finishing_no',
        'washing_no',
        'bundle_no',
        'so_no',
        'item_no',
        'size',
        'input_quantity',
        'output_quantity',
        'defect_quantity',
        'rework_quantity',
        'thread_trimming',
        'ironing',
        'size_measurement',
        'visual_inspection',
        'operator_name',
        'finishing_date',
        'status',
        'defect_details',
        'remarks',
    ];

    protected $casts = [
        'input_quantity' => 'integer',
        'output_quantity' => 'integer',
        'defect_quantity' => 'integer',
        'rework_quantity' => 'integer',
        'thread_trimming' => 'boolean',
        'ironing' => 'boolean',
        'size_measurement' => 'boolean',
        'visual_inspection' => 'boolean',
        'finishing_date' => 'date',
    ];
}