<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktivitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aktivitas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('h_pegawai_id');
            $table->bigInteger('table_code_id');
            $table->time('device_time_in');
            $table->date('device_date_in');
            $table->string('loc_in')->default('0');
            $table->time('device_time_out')->nullable();
            $table->date('device_date_out')->nullable();
            $table->string('loc_out')->nullable();
            $table->bigInteger('customer_site_id')->nullable();
            $table->bigInteger('job_type_id');
            $table->string('foto')->default('0');
            $table->text('deskripsi')->nullable();
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
        Schema::dropIfExists('aktivitas');
    }
}
