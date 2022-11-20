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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nip')->unique();
            $table->string('nama');
            $table->string('jk');
            $table->string('agama');
            $table->text('alamat');
            $table->bigInteger('no_hp');
            $table->unsignedBigInteger('mapel');
            $table->foreign('mapel')->references('id')->on('mapels');
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
        Schema::dropIfExists('gurus');
    }
};
