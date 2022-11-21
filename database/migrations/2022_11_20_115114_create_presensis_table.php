<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensis', function (Blueprint $table) {
            $table->id();
            $table->integer('pertemuan');
            $table->text('tema');
            $table->text('pembahasan');
            $table->timestamp('tgl_presensi');
            $table->unsignedBigInteger('kelas');
            $table->unsignedBigInteger('mapel');
            $table->unsignedBigInteger('guru');
            $table->unsignedBigInteger('siswa');
            $table->foreign('kelas')->references('id')->on('kelas');
            $table->foreign('mapel')->references('id')->on('mapels');
            $table->foreign('guru')->references('id')->on('gurus');
            $table->foreign('siswa')->references('id')->on('siswas');
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
        Schema::dropIfExists('presensis');
    }
};
