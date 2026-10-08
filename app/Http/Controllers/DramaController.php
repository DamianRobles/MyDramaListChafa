<?php

namespace App\Http\Controllers;

use App\Models\Drama;
use Illuminate\Http\Request;

class DramaController extends Controller
{
    public function index()
    {
        $dramas = Drama::all();

        return view('dramas.index', ['dramas' => $dramas]);
    }
    public function create()
    {
        return view('dramas.create');
    }
    public function store(Request $request)
    {
        $datos = $request->validate([
            'titulo'       => ['required', 'string', 'max:255'],
            'sinopsis'     => ['nullable', 'string'],
            'anio'         => ['required', 'integer', 'min:1900', 'max:2100'],
            'estado'       => ['required', 'in:Pendiente,En emisión,Finalizado'],
            'calificacion' => ['nullable', 'numeric', 'between:0,10'],
        ]);

        Drama::create($datos);

        return redirect()
            ->route('dramas.index')
            ->with('exito', 'Drama guardado correctamente.');
    }
}
