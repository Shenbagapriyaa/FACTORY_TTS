<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FabricGroup extends Model
{
    protected $fillable = ['group_code','group_name','description','status'];

    public function fabrics(): BelongsToMany
    {
        return $this->belongsToMany(Fabric::class, 'fabric_group_fabric')->withTimestamps();
    }

    public function layModels(): HasMany
    {
        return $this->hasMany(LayModel::class);
    }
}
