@extends('layouts.app')

@section('titulo', $drama->titulo)

@section('contenido')
    <h1 class="h3">{{ $drama->titulo }}</h1>

    <dl class="row">
        <dt class="col-sm-2">Año</dt>
        <dd class="col-sm-10">{{ $drama->anio }}</dd>

        <dt class="col-sm-2">Estado</dt>
        <dd class="col-sm-10">{{ $drama->estado }}</dd>

        <dt class="col-sm-2">Calificación</dt>
        <dd class="col-sm-10">{{ $drama->calificacion ?? 'Sin calificar' }}</dd>

        <dt class="col-sm-2">Sinopsis</dt>
        <dd class="col-sm-10">{{ $drama->sinopsis ?? 'Sin sinopsis' }}</dd>
    </dl>

    <a href="{{ route('dramas.edit', $drama) }}" class="btn btn-primary">Editar</a>
    <a href="{{ route('dramas.index') }}" class="btn btn-outline-secondary">Volver al listado</a>
@endsection
