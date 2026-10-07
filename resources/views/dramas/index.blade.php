<h1>Mis dramas</h1>

<ul>
    @forelse ($dramas as $drama)
        <li>{{ $drama->titulo }} ({{ $drama->anio }}) - {{ $drama->estado }}</li>
    @empty
        <li>Todavía no hay dramas.</li>
    @endforelse
</ul>
