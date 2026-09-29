<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricIssue extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_no',
        'reservation_id',
        'fabric_store_id',
        'fabric_id',
        'issue_date',
        'order_no',
        'issue_quantity',
        'unit',
        'issued_to',
        'status',
        'remarks',
    ];

    protected $casts = [
        'issue_date' => 'date',
        'issue_quantity' => 'decimal:2',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function fabricStore()
    {
        return $this->belongsTo(FabricStore::class);
    }

    public function fabric()
    {
        return $this->belongsTo(Fabric::class);
    }
}