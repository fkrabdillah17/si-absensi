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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nisn')->unique();
            $table->string('nama')->unique();
            $table->string('jk');
            $table->string('agama');
            $table->text('alamat');
            $table->bigInteger('no_hp');
            $table->unsignedBigInteger('kelas');
            $table->unsignedBigInteger('jurusan');
            $table->unsignedBigInteger('id_ortu');
            $table->foreign('kelas')->references('id')->on('kelas');
            $table->foreign('jurusan')->references('id')->on('jurusans');
            $table->foreign('id_ortu')->references('id')->on('jurusans');
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
};
