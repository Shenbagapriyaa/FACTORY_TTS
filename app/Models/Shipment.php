<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_no',
        'packing_no',
        'so_no',
        'item_no',
        'customer_name',
        'shipment_quantity',
        'shipment_date',
        'destination',
        'transporter',
        'tracking_vehicle_no',
        'status',
        'remarks',
    ];

    protected $casts = [
        'shipment_quantity' => 'integer',
        'shipment_date' => 'date',
    ];
}