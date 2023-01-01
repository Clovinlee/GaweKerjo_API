<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string("description")->nullable(true);
            $table->string("notelp")->nullable(true);;
            $table->string('password');

            // 1 -> user, 0 -> company
            $table->string("type",1);

            //USER
            $table->string("gender",1)->nullable(true);
            $table->date("birthdate")->nullable(true);

            //COMPANY
            $table->string("lokasi")->nullable(true);
            $table->string("founded")->nullable(true);
            $table->string("industry")->nullable(true);

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
        Schema::dropIfExists('users');
    }
};
