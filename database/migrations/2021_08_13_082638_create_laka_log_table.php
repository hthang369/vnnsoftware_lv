<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLakaLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laka_log', function (Blueprint $table) {
            $table->id();
            $table->string('ip', 50);
            $table->string('url', 150);
            $table->datetime('date_log');
            $table->text('message');
            $table->string('log_level', 50);
            $table->string('log_type', 50);
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
        Schema::dropIfExists('laka_log');
    }
}
