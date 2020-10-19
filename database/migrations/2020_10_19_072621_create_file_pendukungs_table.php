<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilePendukungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_pendukungs', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100)->nullable()->default('text');
            $table->string('path', 120)->nullable()->default('text');
            $table->string('ekstensi', 120)->nullable()->default('text');
            $table->string('size', 120)->nullable()->default('text');
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
        Schema::dropIfExists('file_pendukungs');
    }
}
