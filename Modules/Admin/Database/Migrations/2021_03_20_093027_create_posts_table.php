<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

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
            $table->string('post_excerpt')->nullable();
            $table->string('post_name', 150)->nullable();
            $table->datetime('post_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('post_link');
            $table->text('post_content')->nullable();
            $table->string('ob_title', 150)->nullable();
            $table->string('ob_desception', 250)->nullable();
            $table->string('ob_keyword', 100)->nullable();
            $table->string('post_type', 100);
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
        Schema::dropIfExists('post_images');
        Schema::dropIfExists('post_categories');
    }
}
