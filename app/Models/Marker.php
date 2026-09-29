<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marker extends Model
{
    use HasFactory;

    protected $fillable = [
        'marker_no',
        'pattern_no',
        'so_no',
        'item_no',
        'marker_name',
        'size_ratio',
        'marker_length',
        'marker_width',
        'fabric_consumption',
        'ply_count',
        'efficiency',
        'created_date',
        'status',
        'remarks',
    ];

    protected $casts = [
        'marker_length' => 'decimal:2',
        'marker_width' => 'decimal:2',
        'fabric_consumption' => 'decimal:3',
        'efficiency' => 'decimal:2',
        'created_date' => 'date',
    ];
}