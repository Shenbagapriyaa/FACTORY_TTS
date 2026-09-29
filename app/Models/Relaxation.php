<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relaxation extends Model
{
    use HasFactory;

    protected $fillable = [
        'relaxation_no',
        'fabric_store_id',
        'fabric_id',
        'relaxation_date',
        'lot_batch_no',
        'input_quantity',
        'unit',
        'start_time',
        'end_time',
        'duration_hours',
        'status',
        'remarks',
    ];

    protected $casts = [
        'relaxation_date' => 'date',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'input_quantity' => 'decimal:2',
        'duration_hours' => 'decimal:2',
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