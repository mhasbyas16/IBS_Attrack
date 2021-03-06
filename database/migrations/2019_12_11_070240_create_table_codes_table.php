<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_codes', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('code',10);
            $table->string('year',5);
            $table->enum('subject',['absensi','aktivitas','leave']);
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
        Schema::dropIfExists('table_codes');
    }
}
