<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFilePendukungIdToLaporanAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('laporan_anaks', function (Blueprint $table) {
            //
            $table->bigInteger('file_pendukung_id')->nullable()->unsigned();
            $table->foreign('file_pendukung_id')->references('id')->on('file_pendukungs')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('laporan_anaks', function (Blueprint $table) {
            //
            
        });
    }
}
