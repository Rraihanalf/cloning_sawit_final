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
        Schema::create('pegawais', function (Blueprint $table) {
            // $table->id();
            $table->string('id_pegawai')->primary();
            $table->string('id_lab')->nullable();
            $table->string('nama_pegawai');
            $table->string('jenis_kelamin');
            $table->string('email_pegawai');
            $table->string('no_hp_pegawai');
            $table->timestamps();

            // $table->foreign('id_lab')->references('id_lab')->on('laboratoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
};
