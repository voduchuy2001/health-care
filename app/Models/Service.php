<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'meta_description',
        'meta_keywords',
        'meta_title',
        'service_pack_id',
    ];
}
