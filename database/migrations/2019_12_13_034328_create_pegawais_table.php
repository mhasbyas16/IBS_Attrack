<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('nip',10)->unique();
            $table->string('password');
            $table->bigInteger('jabatan_id')->default(0);
            $table->string('nama')->default('0');
            $table->enum('gender',['lk','pr',''])->default('');
            $table->string('email')->default('0');
            $table->text('address')->nullable();
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
        Schema::dropIfExists('pegawais');
    }
}
