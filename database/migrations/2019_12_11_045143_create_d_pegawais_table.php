<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_pegawais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('h_pegawai_id');
            $table->string('nama')->default('0');
            $table->enum('gender',['lk','pr','']);
            $table->string('email')->default('0');
            $table->text('address')->default('0');            
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
        Schema::dropIfExists('d_pegawais');
    }
}
