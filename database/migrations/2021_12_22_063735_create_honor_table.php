<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHonorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_honor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_paa');
            $table->foreign('id_paa')->references('id')->on('users');
            $table->unsignedBigInteger('id_jadwal_sidang');
            $table->foreign('id_jadwal_sidang')->references('id')->on('jadwal_sidang');
            $table->date('tgl_pengajuan');
            $table->string('status');
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
        Schema::dropIfExists('pengajuan');
    }
}
