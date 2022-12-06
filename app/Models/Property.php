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
        'rent',
        'sale',
        'rent_value',
        'sale_value',
        'furnished',
        'pet_friendly',
        'bathrooms',
        'bedrooms',
        'parking',
        'total_area',
        'useful_area',
        'party_hall',
        'playground',
        'square',
        'gym',
        'pool',
    ];

    // $table->id();
    // $table->string('title', 128);
    // $table->string('type', 64);
    // $table->text('description')->nullable();
    // $table->string('address', 128);
    // $table->boolean('rent');
    // $table->boolean('sale');
    // $table->integer('rent_value')->unsigned();
    // $table->integer('sale_value')->unsigned();
    // $table->boolean('furnished');
    // $table->boolean('pet_friendly');
    // $table->smallInteger('bathrooms')->unsigned();
    // $table->smallInteger('bedrooms')->unsigned();
    // $table->smallInteger('parking')->unsigned();
    // $table->smallInteger('total_area')->unsigned();
    // $table->smallInteger('useful_area')->unsigned();
    // $table->boolean('party_hall');
    // $table->boolean('playground');
    // $table->boolean('square');
    // $table->boolean('gym');
    // $table->boolean('pool');
    // $table->timestamps();

    //use HasFactory;
}
