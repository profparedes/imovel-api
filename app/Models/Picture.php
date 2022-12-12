<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'picture',
        'property_id'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
