<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['verifyToken'])->group(function() {
    Route::get('ligas', 'LigaController@index');
    Route::get('ligas/{liga}/equipos', 'LigaController@equipos');
    Route::get('equipos/{equipo}/ligas', 'EquipoController@ligas');
    Route::get('equipos/{equipo}/jugadores', 'EquipoController@jugadores');
    Route::post('jugadores', 'JugadorController@store');
    Route::post('equipos/{equipo}/jugadores/{jugador}', 'EquipoController@addJugador');
    Route::get('equipos', 'EquipoController@index');
    Route::get('jugadores', 'JugadorController@index');
    Route::post('ligas', 'LigaController@store');
});
