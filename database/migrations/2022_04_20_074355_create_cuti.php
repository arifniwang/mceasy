<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuti', function (Blueprint $table) {
            $table->string('nomor_induk');
            $table->date('tanggal_cuti');
            $table->integer('lama_cuti');
            $table->string('keterangan');

            // PK
            $table->primary(['nomor_induk', 'tanggal_cuti']);

            // FK
            $table->foreign('nomor_induk')->references('nomor_induk')->on('karyawan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuti');
    }
}
