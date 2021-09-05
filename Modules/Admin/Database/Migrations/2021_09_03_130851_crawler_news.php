<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrawlerNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crawler_news', function (Blueprint $table) {
            $table->id();
            $table->string('crawler_link', 250);
            $table->string('crawler_selector', 150);
            $table->string('title_selector', 150);
            $table->string('image_selector', 150);
            $table->string('excerpt_selector', 150);
            $table->string('date_selector', 150);
            $table->string('link_selector', 150);
            $table->string('content_selector', 150);
            $table->unsignedSmallInteger('crawler_page_from');
            $table->unsignedSmallInteger('crawler_page_to');
            $table->string('crawler_name', 150);
            $table->unsignedTinyInteger('status');
            $table->timestamps();
        });
        Schema::create('crawler_posts_news', function (Blueprint $table) {
            $table->unsignedInteger('crawler_id');
            $table->unsignedInteger('post_id');
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
        Schema::dropIfExists('crawler_news');
        Schema::dropIfExists('crawler_posts_news');
    }
}
