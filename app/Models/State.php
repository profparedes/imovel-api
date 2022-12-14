<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name',
        'UF'
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

}
