<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    protected $table = 'jugadores';

    protected $fillable = [
        'nombre', 'posicion'
    ];

    public function equipos()
    {
        return $this->belongsToMany(Equipo::class, 'equipo_jugador');
    }
}
