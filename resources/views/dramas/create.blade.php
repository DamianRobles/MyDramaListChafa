@extends('layouts.app')

@section('titulo', 'Agregar drama')

@section('contenido')
    <h1 class="h3 mb-3">Agregar drama</h1>

    <form action="{{ route('dramas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" id="titulo" name="titulo"
                   class="form-control @error('titulo') is-invalid @enderror"
                   value="{{ old('titulo') }}">
            @error('titulo')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="sinopsis" class="form-label">Sinopsis</label>
            <textarea id="sinopsis" name="sinopsis" rows="4"
                      class="form-control @error('sinopsis') is-invalid @enderror">{{ old('sinopsis') }}</textarea>
            @error('sinopsis')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="anio" class="form-label">Año</label>
            <input type="number" id="anio" name="anio"
                   class="form-control @error('anio') is-invalid @enderror"
                   value="{{ old('anio') }}">
            @error('anio')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select id="estado" name="estado"
                    class="form-select @error('estado') is-invalid @enderror">
                <option value="Pendiente" @selected(old('estado') === 'Pendiente')>Pendiente</option>
                <option value="Viendo" @selected(old('estado') === 'Viendo')>Viendo</option>
                <option value="Finalizado" @selected(old('estado') === 'Finalizado')>Finalizado</option>
            </select>
            @error('estado')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="calificacion" class="form-label">Calificación (0 a 10)</label>
            <input type="number" id="calificacion" name="calificacion" step="0.1"
                   class="form-control @error('calificacion') is-invalid @enderror"
                   value="{{ old('calificacion') }}">
            @error('calificacion')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('dramas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
@endsection
