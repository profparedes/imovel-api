<?php

use App\Models\City;
use App\Models\District;
use App\Models\State;
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
            $table->foreignIdFor(District::class)->after('address')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(City::class)->after('district_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(State::class)->after('city_id')->constrained()->cascadeOnDelete();
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
            $table->dropForeign(['district_id']);
            $table->dropColumn('district_id');
            $table->dropForeign(['city_id']);
            $table->dropColumn('city_id');
            $table->dropForeign(['state_id']);
            $table->dropColumn('state_id');
        });
    }
};
