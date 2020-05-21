<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->string('media_house')->nullable();
            $table->string('media_type')->nullable();
            $table->string('website')->unique();
            $table->text('company_profile');
            $table->string('company_name')->unique();
            $table->string('industry_type')->nullable();
            $table->text('policy');
            $table->string('business_cert')->nullable();
            $table->string('operation_cert')->nullable();
            $table->string('company_type');
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
        Schema::dropIfExists('companies');
    }
}
