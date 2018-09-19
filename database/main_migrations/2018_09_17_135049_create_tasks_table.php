<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('tasks')){
            Schema::create('tasks', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->string('name');
                $table->longText('description');
                //$table->foreign('employee_id')->references('id')->on('employees');
                //$table->foreign('project_id')->references('id')->on('projects');
                $table->integer('assign')->unsigned();
                $table->date('start');
                $table->date('deadline');
                $table->integer('status');
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
        Schema::dropIfExists('tasks');
    }
}
