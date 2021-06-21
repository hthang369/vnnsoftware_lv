<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogAccessLakasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_access_lakas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('time_sent_request');
            $table->string('result');
            $table->string('message');
            $table->string('url_download');
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
        Schema::dropIfExists('log_access_lakas');
    }
}
