<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'title',
        'type',
        'description',
        'address',
        'is_rent',
        'is_sale',
        'rent_value',
        'sale_value',
        'is_furnished',
        'is_pet_friendly',
        'bathrooms',
        'bedrooms',
        'parking',
        'total_area',
        'useful_area',
        'has_party_hall',
        'has_playground',
        'has_square',
        'has_gym',
        'has_pool'
    ];

    protected $casts = [
        'is_rent' => 'boolean',
        'is_sale' => 'boolean',
        'rent_value' => 'float',
        'sale_value' => 'float',
        'has_gym' => 'boolean',
        'has_pool' => 'boolean',
        'has_playground' => 'boolean',
        'has_square' => 'boolean',
        'has_party_hall' => 'boolean',
        'is_furnished' => 'boolean',
        'is_pet_friendly' => 'boolean'
    ];
}
