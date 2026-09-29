<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cutting extends Model
{
    use HasFactory;

    protected $fillable = [
        'cutting_no',
        'marker_no',
        'pattern_no',
        'so_no',
        'item_no',
        'cutting_date',
        'fabric_issue_no',
        'lay_quantity',
        'ply_count',
        'planned_cut_qty',
        'actual_cut_qty',
        'rejected_qty',
        'cutter_operator',
        'status',
        'remarks',
    ];

    protected $casts = [
        'cutting_date' => 'date',
        'lay_quantity' => 'decimal:2',
        'planned_cut_qty' => 'decimal:2',
        'actual_cut_qty' => 'decimal:2',
        'rejected_qty' => 'decimal:2',
    ];
}