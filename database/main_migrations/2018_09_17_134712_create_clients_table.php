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
        if(!Schema::hasTable('clients')){
            Schema::create('clients', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->string('name');
                $table->string('email');
                $table->integer('number');
                $table->string('whatsapp')->nullble();
                $table->string('website');
                $table->string('business');
                $table->string('address');
                $table->string('country');
                $table->longText('description');
                $table->timestamps();
            });
        }
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
