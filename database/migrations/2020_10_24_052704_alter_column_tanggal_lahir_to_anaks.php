<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnTanggalLahirToAnaks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anaks', function (Blueprint $table) {
            //
            $table->dropColumn('tanggal_lahir');
        });
        Schema::table('anaks', function (Blueprint $table) {
            //
            $table->dateTime('tanggal_lahir')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anaks', function (Blueprint $table) {
            //
        });
    }
}
