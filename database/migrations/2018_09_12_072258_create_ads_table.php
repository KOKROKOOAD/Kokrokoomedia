<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subscription_id')->unique();
            $table->string('client_id');
            $table->string('ad_title')->length(50);
            $table->string('ad_description')->length(100);
            $table->string('media')->length(50);
            $table->string('media_house')->length(225);
            $table->string('spots')->length(50);
            $table->string('program');
            $table->string('file');
            $table->string('status');
            $table->timestamp('publish_at');
            $table->string('rate');
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
        Schema::dropIfExists('ads');
    }
}
