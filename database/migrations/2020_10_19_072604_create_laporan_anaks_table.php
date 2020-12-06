<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_anaks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_anak')->unsigned()->nullable()->default(12);
            $table->string('jenis_laporan', 100)->nullable()->comment();
            $table->string('deskripsi', 180)->nullable()->comment();
            $table->dateTime('tanggal_laporan')->nullable();

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
        Schema::dropIfExists('laporan_anaks');
    }
}
