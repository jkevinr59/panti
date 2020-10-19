<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonaturHasAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donatur_has_anaks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_donatur')->unsigned()->nullable()->default(12);
            $table->bigInteger('id_anak')->unsigned()->nullable()->default(12);
            $table->integer('is_verified')->unsigned();
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
        Schema::dropIfExists('donatur_has_anaks');
    }
}
