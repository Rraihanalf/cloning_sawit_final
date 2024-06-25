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
        Schema::create('pohons', function (Blueprint $table) {
            // $table->id();
            $table->string('id_pohon')->primary();
            $table->string('id_sampel');
            $table->string('id_lapangan');
            $table->date('tgl_tanam');
            $table->string('daya_hidup')->default('Hidup');
            $table->float('tinggi_pohon');
            $table->date('tgl_kematian')->nullable();
            $table->string('bukti_kematian')->nullable();
            $table->text('deskripsi');
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
        Schema::dropIfExists('pohons');
    }
};
