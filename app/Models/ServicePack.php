<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ServicePack extends Model
{
    protected $table = 'service_packs';

    protected $fillable = [
        'name',
        'description',
        'price',
        'meta_description',
        'meta_keywords',
        'meta_title',
    ];

    public function service(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'services_service_packs', 'service_pack_id', 'service_id')
            ->withTimestamps();
    }
}
