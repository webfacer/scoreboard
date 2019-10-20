<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->boolean('approved')->default(false);
            $table->timestamps();
            $table->string('place')->nullable();
            $table->string('user_id')->nullable();
            $table->string('brewed_by_id')->nullable();
            #$table->string('style')->nullable();
            $table->integer('barcode')->nullable();
            $table->float('alcohol_by_volume', 3, 1)->nullable();
            $table->integer('international_bitterness_unit')->nullable();
            $table->longText('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beers');
    }
}
