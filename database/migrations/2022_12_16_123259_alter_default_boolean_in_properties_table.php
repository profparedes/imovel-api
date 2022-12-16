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
        Schema::table('properties', function (Blueprint $table) {
            $table->boolean('is_rent')->nullable(false)->default(0)->change();
            $table->boolean('is_sale')->nullable(false)->default(0)->change();
            $table->boolean('is_furnished')->default(0)->change();
            $table->boolean('is_pet_friendly')->default(0)->change();
            $table->boolean('has_party_hall')->default(0)->change();
            $table->boolean('has_playground')->default(0)->change();
            $table->boolean('has_square')->default(0)->change();
            $table->boolean('has_gym')->default(0)->change();
            $table->boolean('has_pool')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->boolean('is_rent')->nullable()->default(null)->change();
            $table->boolean('is_sale')->nullable()->default(null)->change();
            $table->boolean('is_furnished')->default(null)->change();
            $table->boolean('is_pet_friendly')->default(null)->change();
            $table->boolean('has_party_hall')->default(null)->change();
            $table->boolean('has_playground')->default(null)->change();
            $table->boolean('has_square')->default(null)->change();
            $table->boolean('has_gym')->default(null)->change();
            $table->boolean('has_pool')->default(null)->change();
        });
    }
};
