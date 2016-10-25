<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function(Blueprint $table){
            $table->increments('id');
            $table->text('description');
            $table->double('quantity')->nullable();
            $table->string('unit', 45)->nullable();
            $table->integer('bidding_id')->unsigned();

            $table->foreign('bidding_id')->references('id')->on('biddings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objects');
    }
}
