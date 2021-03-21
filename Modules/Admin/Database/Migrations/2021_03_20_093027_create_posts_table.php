<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('post_author', 100);
            $table->string('post_title', 150);
            $table->string('post_excerpt');
            $table->string('post_name', 150);
            $table->datetime('post_date');
            $table->string('post_link');
            $table->text('post_content');
            $table->string('ob_title', 150);
            $table->string('ob_desception', 250);
            $table->string('ob_keyword', 100);
            $table->unsignedTinyInteger('post_status');
            $table->timestamps();
        });

        Schema::create('post_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('post_id');
            $table->string('post_image');
            $table->timestamps();
        });

        Schema::create('post_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('category_id');
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
        Schema::dropIfExists('posts');
    }
}
