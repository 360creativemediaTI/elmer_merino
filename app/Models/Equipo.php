<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $fillable = [
        'nombre'
    ];


    public function jugadores()
    {
        return $this->belongsToMany(Jugador::class, 'equipo_jugador');
    }
}
