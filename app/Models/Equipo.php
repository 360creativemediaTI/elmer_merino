<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $fillable = [
        'nombre', 'liga_id'
    ];

    public function liga()
    {
        return $this->belongsTo(Liga::class);
    }

    public function jugadores()
    {
        return $this->belongsToMany(Jugador::class, 'equipo_jugador');
    }
}
