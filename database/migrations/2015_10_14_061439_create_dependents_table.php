<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tax_service_id')->unsigned();
            $table->string('dependentfirstname');
            $table->string('dependentlastname');
            $table->date('dependentdateofbirth');
            $table->string('relationship');
            $table->string('comment');
            $table->string('dependentgender');            
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
        Schema::drop('dependents');
    }
}
