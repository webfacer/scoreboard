<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('delivery_service_id')->nullable();
            $table->boolean('delivery_enabled')->default(false);
            $table->timestamps();
            $table->float('latitude', 10, 8)->nullable()->default(null);
            $table->float('longitude', 11, 8)->nullable()->default(null);
            $table->string('phone_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->dateTime('shop_hours')->nullable()->default(null);
            $table->dateTime('delivery_hours')->nullable()->default(null);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
