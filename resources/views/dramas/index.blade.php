<h1>Mis dramas</h1>

@if (session('exito'))
    <p style="color: green">{{ session('exito') }}</p>
@endif
<a href="{{ route('dramas.create') }}">Agregar drama</a>

<ul>
    @forelse ($dramas as $drama)
        <li>{{ $drama->titulo }} ({{ $drama->anio }}) - {{ $drama->estado }}</li>
    @empty
        <li>Todavía no hay dramas.</li>
    @endforelse
</ul>
