<h1>Agregar drama</h1>

<form action="{{ route('dramas.store') }}" method="POST">
    @csrf

    <div>
        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}">
        @error('titulo')
        <p style="color: red">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="sinopsis">Sinopsis</label>
        <textarea id="sinopsis" name="sinopsis">{{ old('sinopsis') }}</textarea>
        @error('sinopsis')
        <p style="color: red">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="anio">Año</label>
        <input type="number" id="anio" name="anio" value="{{ old('anio') }}">
        @error('anio')
        <p style="color: red">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="estado">Estado</label>
        <select id="estado" name="estado">
            <option value="Pendiente" @selected(old('estado') === 'Pendiente')>Pendiente</option>
            <option value="En emisión" @selected(old('estado') === 'En emisión')>En emisión</option>
            <option value="Finalizado" @selected(old('estado') === 'Finalizado')>Finalizado</option>
        </select>
        @error('estado')
        <p style="color: red">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="calificacion">Calificación (0 a 10)</label>
        <input type="number" id="calificacion" name="calificacion" step="0.1" value="{{ old('calificacion') }}">
        @error('calificacion')
        <p style="color: red">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">Guardar</button>
</form>

<a href="{{ route('dramas.index') }}">Volver al listado</a>
