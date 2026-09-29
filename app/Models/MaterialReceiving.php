<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MaterialReceiving extends Model
{
    use HasFactory;

    protected $fillable = [
        'receiving_no',
        'supplier_name',
        'fabric_id',
        'received_date',
        'lot_batch_no',
        'received_quantity',
        'unit',
        'remarks',
        'status',
    ];

    protected $casts = [
        'received_date' => 'date',
        'received_quantity' => 'decimal:2',
    ];

    public function fabric()
    {
        return $this->belongsTo(Fabric::class);
    }

    public function grn(): HasOne
    {
        return $this->hasOne(GRN::class);
    }
}