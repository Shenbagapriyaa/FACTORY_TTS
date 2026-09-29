<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspection_no',
        'grn_id',
        'inspection_date',
        'received_quantity',
        'inspected_quantity',
        'accepted_quantity',
        'rejected_quantity',
        'status',
        'defect_remarks',
        'remarks',
    ];

    protected $casts = [
        'inspection_date' => 'date',
        'received_quantity' => 'decimal:2',
        'inspected_quantity' => 'decimal:2',
        'accepted_quantity' => 'decimal:2',
        'rejected_quantity' => 'decimal:2',
    ];

    public function grn()
    {
        return $this->belongsTo(GRN::class);
    }
}