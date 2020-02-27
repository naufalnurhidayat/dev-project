<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporariTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporari', function (Blueprint $table) {
            $table->increments('id_temp');
            $table->integer('id_barang');
            $table->integer('id_kategori');
            $table->integer('id');
            $table->string('nama_pinjam');
            $table->integer('jumlah_pinjam');
            $table->date('tgl_pinjam');
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
        Schema::dropIfExists('temporari');
    }
}
