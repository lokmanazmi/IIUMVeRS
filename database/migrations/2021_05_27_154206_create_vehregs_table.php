<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehregsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('vehregs', function (Blueprint $table) {
                $table->id();
                $table->string('plateno');
                $table->foreign('plateno')->references('plateno')->on('vehicles')
                ->onUpdate('cascade')->onDelete('cascade');
                $table->string('username');
                $table->foreign('username')->references('username')->on('applicants')
                ->onUpdate('cascade')->onDelete('cascade');
                $table->string('admin');
                $table->foreign('admin')->references('username')->on('admins')
                ->onUpdate('cascade')->onDelete('cascade')->nullable();
                $table->string('status')->nullable();
                $table->Date('expDate')->nullable();
                $table->string('stickerNo')->nullable();
                $table->string('rejectedReason')->nullable();
                $table->string('revokedReason')->nullable();
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
        Schema::dropIfExists('vehregs');
    }
}
