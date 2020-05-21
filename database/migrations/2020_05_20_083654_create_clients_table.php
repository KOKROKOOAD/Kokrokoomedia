<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_id');
            $table->string('name');
            $table->string('title');
            $table->string('email')->unique();
            $table->string('phone1')->unique();
            $table->string('phone2')->unique()->nullable();
            $table->string('company_id')->nullable();
            $table->string('role');
            $table->string('account_type');
            $table->string('isActive')->default('pending');
            $table->string('activation_code')->nullable();
            $table->string('last_login')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('clients');
    }
}
