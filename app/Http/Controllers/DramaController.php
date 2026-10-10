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

    public function edit(Drama $drama)
    {
        return view('dramas.edit', ['drama' => $drama]);
    }

    public function update(Request $request, Drama $drama)
    {
        $datos = $request->validate([
            'titulo'       => ['required', 'string', 'max:255'],
            'sinopsis'     => ['nullable', 'string'],
            'anio'         => ['required', 'integer', 'min:1900', 'max:2100'],
            'estado'       => ['required', 'in:Pendiente,En emisión,Finalizado'],
            'calificacion' => ['nullable', 'numeric', 'between:0,10'],
        ]);

        $drama->update($datos);

        return redirect()
            ->route('dramas.index')
            ->with('exito', 'Drama actualizado correctamente.');
    }

    public function show(Drama $drama)
    {
        return view('dramas.show', ['drama' => $drama]);
    }

    public function destroy(Drama $drama)
    {
        $drama->delete();

        return redirect()
            ->route('dramas.index')
            ->with('exito', 'Drama eliminado correctamente.');
    }
}
