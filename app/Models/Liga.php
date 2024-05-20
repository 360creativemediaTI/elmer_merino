<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Liga extends Model
{
    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'cantidad_fechas',
        'es_nacional'
    ];

    public function equipos()
    {
        return $this->belongsToMany(Equipo::class, 'liga_equipo');
    }
}
