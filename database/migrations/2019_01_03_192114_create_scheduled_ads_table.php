<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduledAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduled_ads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsined();
            $table->string('rate_card_id');
            $table->string('status');
            $table->json('created_ad_data');
            $table->string('file_name');
            $table->string('file_type');
            $table->string('file_path');
            $table->string('file_size');
            $table->timestamp('deleted_at');
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
        Schema::dropIfExists('scheduled_ads');
    }
}
