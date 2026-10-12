<?php

namespace App\Http\Controllers;

use App\Models\Drama;
use App\Http\Requests\DramaRequest;
use App\Models\Genero;
use Illuminate\Http\Request;

class DramaController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->query('buscar');

        $dramas = Drama::query()
            ->with('genero')
            ->when($buscar, fn ($query) => $query->where('titulo', 'like', "%{$buscar}%"))
            ->orderBy('titulo')
            ->paginate(10)
            ->withQueryString();

        return view('dramas.index', ['dramas' => $dramas, 'buscar' => $buscar]);
    }

    public function create()
    {
        return view('dramas.create', [
            'generos' => Genero::orderBy('nombre')->get(),
        ]);
    }

    public function store(DramaRequest $request)
    {
        Drama::create($request->validated());

        return redirect()
            ->route('dramas.index')
            ->with('exito', 'Drama guardado correctamente.');
    }

    public function edit(Drama $drama)
    {
        return view('dramas.edit', [
            'drama'   => $drama,
            'generos' => Genero::orderBy('nombre')->get(),
        ]);
    }

    public function update(DramaRequest $request, Drama $drama)
    {
        $drama->update($request->validated());

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

    public function cambiarEstado(Request $request, Drama $drama)
    {
        $datos = $request->validate([
            'estado' => ['required', 'in:Pendiente,Viendo,Finalizado'],
        ]);

        $drama->update($datos);

        return back()->with('exito', 'Estado actualizado.');
    }
}
