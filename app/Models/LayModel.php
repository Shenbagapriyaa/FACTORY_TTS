<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LayModel extends Model
{
    protected $fillable = [
        'lay_model_code','lay_model_name','fabric_group_id','fabric_id','lay_length','lay_width',
        'number_of_plies','garment_size','marker_length','marker_width','description','status'
    ];

    protected function casts(): array
    {
        return [
            'lay_length' => 'decimal:2', 'lay_width' => 'decimal:2', 'number_of_plies' => 'integer',
            'marker_length' => 'decimal:2', 'marker_width' => 'decimal:2'
        ];
    }

    public function fabricGroup(): BelongsTo { return $this->belongsTo(FabricGroup::class); }
    public function fabric(): BelongsTo { return $this->belongsTo(Fabric::class); }
}
