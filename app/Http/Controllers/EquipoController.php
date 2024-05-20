<?php
namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Liga;
use App\Models\JUgador;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function index()
    {
        return Equipo::all();
    }

    public function show(Equipo $equipo)
    {
        return $equipo->load('jugadores');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string'
        ]);

        $equipo = Equipo::create($request->all());
        return response()->json($equipo, 201);
    }

    public function update(Request $request, Equipo $equipo)
    {
        $request->validate([
            'nombre' => 'sometimes|required|string',
            'liga_id' => 'sometimes|required|exists:ligas,id'
        ]);

        $equipo->update($request->all());
        return response()->json($equipo, 200);
    }

    public function destroy(Equipo $equipo)
    {
        $equipo->delete();
        return response()->json(null, 204);
    }

    public function addJugador(Request $request, $equipoId, $jugadorId)
    {
        $equipo = Equipo::findOrFail($equipoId);
        $jugador = Jugador::findOrFail($jugadorId);
        
        $equipo->jugadores()->attach($jugador);

        return response()->json(['message' => 'Jugador agregado al equipo con éxito']);
    }
}
