<h1>Mis dramas</h1>

@if (session('exito'))
    <p style="color: green">{{ session('exito') }}</p>
@endif
<a href="{{ route('dramas.create') }}">Agregar drama</a>

<ul>
    @forelse ($dramas as $drama)
        <li>
            <a href="{{ route('dramas.show', $drama) }}">{{ $drama->titulo }}</a>
            ({{ $drama->anio }}) - {{ $drama->estado }}
            <a href="{{ route('dramas.edit', $drama) }}">Editar</a>

            <form action="{{ route('dramas.destroy', $drama) }}" method="POST" style="display: inline"
                  onsubmit="return confirm('¿Eliminar este drama?')">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        </li>
    @empty
        <li>Todavía no hay dramas.</li>
    @endforelse
</ul>
