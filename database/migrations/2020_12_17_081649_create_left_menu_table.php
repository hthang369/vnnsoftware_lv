<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeftMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('left_menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('top_menu_id');
            $table->string('prefix');
            $table->string('index')->nullable();
            $table->string('url')->nullable();
            $table->string('lang');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('left_menu');
    }
}
