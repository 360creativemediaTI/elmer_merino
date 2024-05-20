<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipoJugadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_jugador', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('equipo_id');
            $table->unsignedBigInteger('jugador_id');
            $table->timestamps();

            // Foreign keys
            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('jugador_id')->references('id')->on('jugadores')->onDelete('cascade');

            // Unique constraint to prevent duplicate entries
            $table->unique(['equipo_id', 'jugador_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipo_jugador');
    }
}

