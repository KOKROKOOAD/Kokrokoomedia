<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_id');
            $table->string('name');
            $table->string('title');
            $table->string('email')->unique();
            $table->string('phone1')->unique();
            $table->string('phone2')->unique();
            $table->string('address');
            $table->string('media')->nullable();
            $table->string('media_house')->nullable();
            $table->string('website')->unique()->nullable();
            $table->string('company_profile')->nullable();
            $table->string('company_name')->unique()->nullable();
            $table->string('industry_type');
            $table->string('policies')->nullable();
            $table->string('logo')->nullable()->unique();
            $table->string('file_path')->nullable();
            $table->string('file_size')->nullable();
            $table->string('role');
            $table->boolean('isActive')->default(false);
            $table->string('activation_code')->nullable();
            $table->string('last_login')->nullable();
            $table->string('account_type');
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
        Schema::dropIfExists('users');
    }
}
