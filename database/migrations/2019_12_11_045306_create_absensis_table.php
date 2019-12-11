<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('h_pegawai_id');
            $table->bigInteger('table_code_id');
            $table->time('server_time_in');
            $table->date('server_date_in');
            $table->time('device_time_in');
            $table->date('device_date_in');
            $table->string('loc_in')->default('0');
            $table->time('server_time_out')->nullable();
            $table->date('server_date_out')->nullable();
            $table->time('device_time_out')->nullable();
            $table->date('device_date_out')->nullable();
            $table->string('loc_out')->nullable();
            $table->enum('status',['hadir','telat','']);
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
        Schema::dropIfExists('absensis');
    }
}
