<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['verifyToken'])->group(function() {
    
    Route::get('jugadores', 'JugadorController@index');
    Route::get('jugadores-sin-equipo', 'JugadorController@jugadoresSinEquipo');
    Route::post('jugadores', 'JugadorController@store');

    Route::get('ligas', 'LigaController@index');
    Route::get('ligas/{liga}/equipos', 'LigaController@equipos');
    Route::post('ligas', 'LigaController@store');
    
    Route::get('equipos/{equipo}/ligas', 'EquipoController@ligas');
    Route::get('equipos/{equipo}/jugadores', 'EquipoController@jugadores');
    Route::get('equipos', 'EquipoController@index');
    Route::post('equipos/{equipo}/jugadores/{jugador}', 'EquipoController@addJugador');
    Route::post('equipos', 'EquipoController@store');
});
