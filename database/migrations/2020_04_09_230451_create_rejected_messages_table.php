<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRejectedMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rejected_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('message');
            $table->string('client_id');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return vo2
     */
    public function down()
    {
        Schema::dropIfExists('rejected_messages');
    }
}