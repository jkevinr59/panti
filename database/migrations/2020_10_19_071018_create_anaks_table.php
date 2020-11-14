<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anaks', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100)->nullable()->default('text');
            $table->string('tempat_lahir', 100)->nullable()->default('text');
            $table->string('tanggal_lahir', 100)->nullable()->default('text');
            $table->string('nik', 100)->nullable()->default('text');
            $table->string('jenis_kelamin', 100)->nullable()->default('text');
            $table->string('sekolah', 100)->nullable()->default('text');
            $table->string('asal', 100)->nullable()->default('text');
            $table->bigInteger('id_foto')->nullable()->unsigned();
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
        Schema::dropIfExists('anaks');
    }
}
