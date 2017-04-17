<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spouses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tax_service_id')->unsigned();
            $table->string('spousefirstname');
            $table->string('spouselastname');
            $table->string('spousesocialinsurancenumber')->unique();
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
        Schema::drop('spouses');
    }
}
