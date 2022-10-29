<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuezTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juez', function (Blueprint $table) {
            $table->id();
            $table->String('nameJuez');
            $table->String('apellidoJuez');
            $table->String('ci');
            $table->String('fechaNac');
            $table->String('genero');
            $table->String('foto');
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
        Schema::dropIfExists('juez');
    }
}
