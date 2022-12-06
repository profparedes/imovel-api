<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title', 128);
            $table->string('type', 64);
            $table->text('description')->nullable();
            $table->string('address', 128);
            $table->boolean('is_rent')->nullable();
            $table->boolean('is_sale')->nullable();
            $table->integer('rent_value')->unsigned()->nullable();
            $table->integer('sale_value')->unsigned()->nullable();
            $table->boolean('is_furnished');
            $table->boolean('is_pet_friendly');
            $table->smallInteger('bathrooms')->unsigned();
            $table->smallInteger('bedrooms')->unsigned();
            $table->smallInteger('parking')->unsigned();
            $table->smallInteger('total_area')->unsigned();
            $table->smallInteger('useful_area')->unsigned();
            $table->boolean('has_party_hall');
            $table->boolean('has_playground');
            $table->boolean('has_square');
            $table->boolean('has_gym');
            $table->boolean('has_pool');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};
