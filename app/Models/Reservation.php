<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_no',
        'fabric_store_id',
        'fabric_id',
        'reservation_date',
        'order_no',
        'reserved_quantity',
        'unit',
        'purpose',
        'status',
        'remarks',
    ];

    protected $casts = [
        'reservation_date' => 'date',
        'reserved_quantity' => 'decimal:2',
    ];

    public function fabricStore()
    {
        return $this->belongsTo(FabricStore::class);
    }

    public function fabric()
    {
        return $this->belongsTo(Fabric::class);
    }
}