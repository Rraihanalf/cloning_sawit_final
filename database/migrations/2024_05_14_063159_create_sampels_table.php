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
        Schema::create('sampels', function (Blueprint $table) {
            // $table->id();
            $table->string('id_sampel')->primary();
            $table->string('id_lab');
            $table->string('jenis_bibit');
            $table->string('asal_bibit');
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
        Schema::dropIfExists('sampels');
    }
};
