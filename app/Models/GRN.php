<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GRN extends Model
{
    use HasFactory;

    protected $table = 'grns';

    protected $fillable = [
        'grn_no',
        'material_receiving_id',
        'grn_date',
        'supplier_name',
        'received_quantity',
        'unit',
        'accepted_quantity',
        'rejected_quantity',
        'status',
        'remarks',
    ];

    protected $casts = [
        'grn_date' => 'date',
        'received_quantity' => 'decimal:2',
        'accepted_quantity' => 'decimal:2',
        'rejected_quantity' => 'decimal:2',
    ];

    /**
     * GRN belongs to a material receiving record.
     */
    public function materialReceiving()
    {
        return $this->belongsTo(
            MaterialReceiving::class
        );
    }

    /**
     * GRN has one inspection record.
     */
    public function inspection()
    {
        return $this->hasOne(
            Inspection::class,
            'grn_id'
        );
    }
}