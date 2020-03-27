<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nip')->unique();
            $table->text('foto');
            $table->string('nama');
            $table->string('tmp_lahir');
            $table->date('tgl_lahir');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('jenkel', ['Laki-laki', 'Perempuan']);
            $table->integer('jatah_cuti')->nullable();
            $table->integer('id_role');
            $table->integer('id_stream');
            $table->integer('id_pendidikan');
            $table->integer('thn_join');
            $table->string('no_telp')->unique();
            $table->string('agama');
            $table->text('alamat');
            $table->integer('is_active', 1);
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
        Schema::dropIfExists('users');
    }
}
