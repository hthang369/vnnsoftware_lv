<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('menu_name', 150);
            $table->string('menu_link');
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedSmallInteger('menu_lft');
            $table->unsignedSmallInteger('menu_rgt');
            $table->unsignedInteger('partial_id')->nullable();
            $table->string('partial_table')->nullable();
            $table->string('menu_type');
            $table->string('menu_view', 100)->nullable();
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
        Schema::dropIfExists('menus');
    }
}
