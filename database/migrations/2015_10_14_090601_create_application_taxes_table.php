<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_taxes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tax_service_id')->unsigned();
            $table->string('typeoftaxreturn');
            $table->integer('discount')->unsigned()->default(0);
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
        Schema::drop('application_taxes');
    }
}
