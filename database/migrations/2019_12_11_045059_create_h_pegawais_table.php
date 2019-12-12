<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_pegawais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nip',20);
            $table->string('password');
            $table->string('hakases',25);
            $table->bigInteger('jabatan_id');
            $table->string('imei');
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
        Schema::dropIfExists('h_pegawais');
    }
}
