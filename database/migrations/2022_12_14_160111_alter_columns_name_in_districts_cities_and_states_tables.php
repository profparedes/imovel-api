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
        Schema::table('districts', function (Blueprint $table) {
            $table->renameColumn('district', 'name');
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->renameColumn('city', 'name');
        });

        Schema::table('states', function (Blueprint $table) {
            $table->renameColumn('state', 'name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('districts', function (Blueprint $table) {
            $table->renameColumn('name', 'district');
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->renameColumn('name', 'city');
        });

        Schema::table('states', function (Blueprint $table) {
            $table->renameColumn('name', 'state');
        });
    }
};
