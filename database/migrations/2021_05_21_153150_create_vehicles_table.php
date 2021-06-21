<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->string('plateno');
            $table->string('username');
            $table->foreign('username')->references('username')->on('applicants')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->string('type');
            $table->string('colour');
            $table->string('brand');
            $table->string('model');
            $table->timestamps();
            $table->rememberToken();
            $table->primary(['plateno']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
