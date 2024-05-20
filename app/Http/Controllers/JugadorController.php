<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;

class JugadorController extends Controller
{
    public function index()
    {
        return Jugador::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'posicion' => 'nullable|string|max:255',
        ]);

        $jugador = Jugador::create($request->all());

        return response()->json($jugador, 201);
    }
}
