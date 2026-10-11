@extends('layouts.app')

@section('titulo', 'Mis dramas')

@section('contenido')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Mis dramas</h1>
        <a href="{{ route('dramas.create') }}" class="btn btn-primary">Agregar drama</a>
    </div>

    <form action="{{ route('dramas.index') }}" method="GET" class="row g-2 mb-3">
        <div class="col">
            <input type="text" name="buscar" value="{{ $buscar }}"
                   class="form-control" placeholder="Buscar por título...">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-outline-primary">Buscar</button>
            @if ($buscar)
                <a href="{{ route('dramas.index') }}" class="btn btn-outline-secondary">Limpiar</a>
            @endif
        </div>
    </form>

    <table class="table table-striped align-middle">
        <thead>
        <tr>
            <th>Título</th>
            <th>Año</th>
            <th>Estado</th>
            <th>Género</th>
            <th>Calificación</th>
            <th class="text-end">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($dramas as $drama)
            <tr>
                <td><a href="{{ route('dramas.show', $drama) }}">{{ $drama->titulo }}</a></td>
                <td>{{ $drama->anio }}</td>
                <td>{{ $drama->estado }}</td>
                <td>{{ $drama->genero->nombre ?? '—' }}</td>
                <td>{{ $drama->calificacion ?? '—' }}</td>
                <td class="text-end">
                    <a href="{{ route('dramas.edit', $drama) }}" class="btn btn-sm btn-outline-secondary">Editar</a>

                    <form action="{{ route('dramas.destroy', $drama) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('¿Eliminar este drama?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Todavía no hay dramas.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $dramas->links() }}
@endsection
