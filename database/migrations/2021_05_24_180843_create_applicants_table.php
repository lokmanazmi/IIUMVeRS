<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->string('username');
            $table->string('name');
            $table->string('email')->unique();
            $table->rememberToken();
            $table->timestamps();
            $table->string('type');
            $table->string('phoneno');
            $table->string('status');
            $table->primary(['username']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}
