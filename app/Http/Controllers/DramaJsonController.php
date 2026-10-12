<?php

namespace App\Http\Controllers;

use App\Models\Drama;

class DramaJsonController extends Controller
{
    public function index()
    {
        $dramas = Drama::with('genero')->orderBy('titulo')->get();

        return response()->json([
            'total' => $dramas->count(),
            'datos' => $dramas,
        ]);
    }

    public function show($id)
    {
        $drama = Drama::with('genero')->find($id);

        if (! $drama) {
            return response()->json(['mensaje' => 'Drama no encontrado'], 404);
        }

        return response()->json($drama);
    }
}
