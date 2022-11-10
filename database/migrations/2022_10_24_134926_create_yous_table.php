<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yous', function (Blueprint $table) {
            $table->id();
            $table->string('yfname')->nullable();
            $table->string('ylname')->nullable();
            $table->string('yaddress')->nullable();
            $table->string('yemail')->nullable();
            $table->string('ymobile')->nullable();
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
        Schema::dropIfExists('yous');
    }
}
