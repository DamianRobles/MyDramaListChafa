<?php

namespace App\Http\Controllers;

use App\Models\Drama;
use App\Http\Requests\DramaRequest;

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

    public function store(DramaRequest $request)
    {
        Drama::create($request->validated());

        return redirect()
            ->route('dramas.index')
            ->with('exito', 'Drama guardado correctamente.');
    }
    public function edit(Drama $drama)
    {
        return view('dramas.edit', ['drama' => $drama]);
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
}
