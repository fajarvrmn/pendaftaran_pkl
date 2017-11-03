<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_siswa');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('keahlian');
            $table->string('jenis_kelamin');
            $table->string('kontak');
            $table->string('sertifikat');
            $table->string('data');
            $table->string('email');
            $table->integer('sekolah_id')->unsigned();
            $table->foreign('sekolah_id')->references('id')->on('sekolahs')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('siswas');
    }
}
