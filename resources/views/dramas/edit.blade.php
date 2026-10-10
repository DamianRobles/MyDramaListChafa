@extends('layouts.app')

@section('titulo', 'Editar drama')

@section('contenido')
    <h1 class="h3 mb-3">Editar drama</h1>

    <form action="{{ route('dramas.update', $drama) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" id="titulo" name="titulo"
                   class="form-control @error('titulo') is-invalid @enderror"
                   value="{{ old('titulo', $drama->titulo) }}">
            @error('titulo')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="sinopsis" class="form-label">Sinopsis</label>
            <textarea id="sinopsis" name="sinopsis" rows="4"
                      class="form-control @error('sinopsis') is-invalid @enderror">{{ old('sinopsis', $drama->sinopsis) }}</textarea>
            @error('sinopsis')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="anio" class="form-label">Año</label>
            <input type="number" id="anio" name="anio"
                   class="form-control @error('anio') is-invalid @enderror"
                   value="{{ old('anio', $drama->anio) }}">
            @error('anio')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select id="estado" name="estado"
                    class="form-select @error('estado') is-invalid @enderror">
                <option value="Pendiente" @selected(old('estado', $drama->estado) === 'Pendiente')>Pendiente</option>
                <option value="Viendo" @selected(old('estado', $drama->estado) === 'Viendo')>Viendo</option>
                <option value="Finalizado" @selected(old('estado', $drama->estado) === 'Finalizado')>Finalizado</option>
            </select>
            @error('estado')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="calificacion" class="form-label">Calificación (0 a 10)</label>
            <input type="number" id="calificacion" name="calificacion" step="0.1"
                   class="form-control @error('calificacion') is-invalid @enderror"
                   value="{{ old('calificacion', $drama->calificacion) }}">
            @error('calificacion')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('dramas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
@endsection
