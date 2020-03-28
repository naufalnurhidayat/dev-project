<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuti', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_karyawan');
            $table->integer('id_jenis_cuti');
            $table->dateTime('tgl_cuti');
            $table->date('awal_cuti');
            $table->date('akhir_cuti');
            $table->integer('total_cuti');
            $table->string('alasan_cuti');
            $table->enum('status', ['Diterima', 'Diproses', 'Ditolak']);
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
        Schema::dropIfExists('cuti');
    }
}
