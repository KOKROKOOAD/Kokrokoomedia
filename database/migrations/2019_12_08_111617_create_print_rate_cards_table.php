<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrintRateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('print_rate_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rate_card_id');
            $table->string('rate_card_data');
            $table->string('rate_card_title_id')->nullable();
            $table->string('media_house_id')->nullable();
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
        Schema::dropIfExists('print_rate_cards');
    }
}
