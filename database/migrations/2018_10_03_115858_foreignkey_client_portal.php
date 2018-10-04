<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignkeyClientPortal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients_portal', function (Blueprint $table) {
            $table->integer('business_type')->unsigned()->nullable();
            $table->foreign('business_type')->references('id')->on('business_types')->onDelete('cascade');
            $table->integer('area_id')->unsigned()->nullable();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->integer('status')->unsigned()->nullable();
            $table->foreign('status')->references('id')->on('statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients_portal', function (Blueprint $table) {
            $table->dropForeign('client_portal_business_type_foreign');
            $table->dropForeign('client_portal_area_id_foreign');
            $table->dropForeign('client_portal_status_foreign');
        });
    }
}
