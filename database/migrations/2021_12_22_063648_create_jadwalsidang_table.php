<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsidangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwalsidang', function (Blueprint $table) {
            $table->increments('id_sidang');
            $table->integer('nim')->unsigned();
            $table->foreign('nim')->references('nim')->on('mahasiswa');
            $table->integer('kode_paa')->unsigned();
            $table->foreign('kode_paa')->references('kode_paa')->on('paa');
            $table->integer('nip')->unsigned();
            $table->foreign('nip')->references('nip')->on('dosen');
            $table->dateTime('tgl_sidang');
            $table->string('judul');
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
        Schema::dropIfExists('jadwalsidang');
    }
}
