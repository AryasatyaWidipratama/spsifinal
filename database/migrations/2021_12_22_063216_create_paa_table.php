<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paa', function (Blueprint $table) {
                $table->increments('kode_paa');
                $table->string('nama');
                $table->string('no_telp');
                $table->string('email');
                $table->string('alamat');
                $table->string('jenis_kelamin');
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
        Schema::dropIfExists('paa');
    }
}
