<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pattern extends Model
{
    use HasFactory;

    protected $fillable = [
        'pattern_no',
        'so_no',
        'item_no',
        'pattern_name',
        'cad_file_name',
        'size_range',
        'pattern_version',
        'created_date',
        'status',
        'remarks',
    ];

    protected $casts = [
        'created_date' => 'date',
    ];
}