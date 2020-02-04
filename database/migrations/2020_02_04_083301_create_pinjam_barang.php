<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjam_barang', function (Blueprint $table) {
            $table->increments('id_pinjam');
            $table->integer('id_barang');
            $table->string('nama_pinjam');
            $table->integer('jumlah_pinjam');
            $table->date('tgl_pinjam');
            $table->enum('status', ['Pinjam', 'Kembali']);
            $table->string('keterangan');
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
        Schema::dropIfExists('pinjam_barang');
    }
}
