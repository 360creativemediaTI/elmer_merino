<?php
namespace App\Http\Controllers;

use App\Models\Liga;
use Illuminate\Http\Request;

class LigaController extends Controller
{
    public function index()
    {
        return Liga::where('es_nacional', true)->get();
    }

    public function show(Liga $liga)
    {
        return $liga->load('equipos');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'cantidad_fechas' => 'required|integer',
            'es_nacional' => 'required|boolean'
        ]);

        $liga = Liga::create($request->all());
        return response()->json($liga, 201);
    }

    public function update(Request $request, Liga $liga)
    {
        $request->validate([
            'nombre' => 'sometimes|required|string',
            'fecha_inicio' => 'sometimes|required|date',
            'fecha_fin' => 'sometimes|required|date',
            'cantidad_fechas' => 'sometimes|required|integer',
            'es_nacional' => 'sometimes|required|boolean'
        ]);

        $liga->update($request->all());
        return response()->json($liga, 200);
    }

    public function destroy(Liga $liga)
    {
        $liga->delete();
        return response()->json(null, 204);
    }
}
