<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name', 150);
            $table->string('category_excerpt');
            $table->string('category_link');
            $table->string('category_image');
            $table->unsignedSmallInteger('category_lft');
            $table->unsignedSmallInteger('category_rgt');
            $table->string('ob_title', 150);
            $table->string('ob_desception', 250);
            $table->string('ob_keyword', 100);
            $table->unsignedTinyInteger('category_status');
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
        Schema::dropIfExists('categories');
    }
}
