<h1>{{ $drama->titulo }}</h1>

<p><strong>Año:</strong> {{ $drama->anio }}</p>
<p><strong>Estado:</strong> {{ $drama->estado }}</p>
<p><strong>Calificación:</strong> {{ $drama->calificacion ?? 'Sin calificar' }}</p>
<p><strong>Sinopsis:</strong> {{ $drama->sinopsis ?? 'Sin sinopsis' }}</p>

<a href="{{ route('dramas.edit', $drama) }}">Editar</a>
<a href="{{ route('dramas.index') }}">Volver al listado</a>
