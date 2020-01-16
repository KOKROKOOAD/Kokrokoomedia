<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTvRadioCardRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tv_radio_card_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_id');
            $table->string('rate_card_id')->unique();
            $table->timestamp('publish_date');
            $table->time('time');
            $table->string('spots');
            $table->string('programs');
            $table->string('percentile');
            $table->string('rates');
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
        Schema::dropIfExists('tv_radio_card_rates');
    }
}
