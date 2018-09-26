<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('projects')){
            Schema::create('projects', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('project_url');
                $table->longText('description');
                $table->date('start_date');
                $table->date('deadline');
                $table->integer('status');
                $table->integer('assign');
                $table->decimal('price');
                $table->decimal('released_payment', 19,2);
                $table->decimal('pending_payment', 19,2);
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
        Schema::dropIfExists('projects');
    }
}
