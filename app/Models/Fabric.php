<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fabric extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'fabric_code','fabric_name','fabric_type','composition','color','gsm','width','unit','description','status'
    ];

    protected function casts(): array
    {
        return ['gsm' => 'decimal:2', 'width' => 'decimal:2'];
    }

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(FabricGroup::class, 'fabric_group_fabric')->withTimestamps();
    }

    public function layModels(): HasMany
    {
        return $this->hasMany(LayModel::class);
    }
}
