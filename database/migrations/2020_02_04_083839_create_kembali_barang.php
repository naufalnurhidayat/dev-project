<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKembaliBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kembali_barang', function (Blueprint $table) {
            $table->increments('id_kembali');
            $table->integer('id');
            $table->integer('id_kategori');
            $table->integer('id_barang');
            $table->integer('id_pinjam');
            $table->date('tgl_kembali');
            $table->string('status_kembali');
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
        Schema::dropIfExists('kembali_barang');
    }
}
