<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rate_card_id');
            $table->string('client_id');
            $table->string('media_house_id')->nullable();
            $table->string('rate_card_title_id');
            $table->json('days_of_week');
            $table->json('days_of_weekend');
            $table->json('segments');
            $table->json('weekend_segments');
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
        Schema::dropIfExists('rate_cards');
    }
}
