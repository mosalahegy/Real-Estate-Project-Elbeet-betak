<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('price');
            $table->tinyInteger('rent');
            $table->integer('rooms');
            $table->string('area');
            $table->tinyInteger('type');
            $table->string('small_desc');
            $table->text('large_desc');
            $table->string('meta');
            $table->tinyInteger('status');
            $table->string('langtude');
            $table->string('latitude');
            $table->integer('region');
            $table->string('image');
            $table->tinyInteger('approve');
            $table->integer('user_id');
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
        Schema::dropIfExists('buildings');
    }
}
