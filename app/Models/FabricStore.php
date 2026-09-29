<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricStore extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_no',
        'grn_id',
        'fabric_id',
        'store_date',
        'quantity_received',
        'quantity_available',
        'unit',
        'location',
        'rack_no',
        'status',
        'remarks',
    ];

    protected $casts = [
        'store_date' => 'date',
        'quantity_received' => 'decimal:2',
        'quantity_available' => 'decimal:2',
    ];

    public function grn()
    {
        return $this->belongsTo(GRN::class);
    }

    public function fabric()
    {
        return $this->belongsTo(Fabric::class);
    }
}