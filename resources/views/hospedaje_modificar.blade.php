<x-layouts::app>
    <div>
        <form method="POST" action="{{ route('hospedajes.update', $hospedaje->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ $hospedaje->nombre }}" required>
            <label for="capacidad">Capacidad:</label>
            <input type="number" id="capacidad" name="capacidad" value="{{ $hospedaje->capacidad }}" required>
            <label for="tipo">Tipo:</label>
            <select id="tipo" name="tipo" required>
                <option value="hotel" {{ $hospedaje->tipo === 'hotel' ? 'selected' : '' }}>Hotel</option>
                <option value="airbnb" {{ $hospedaje->tipo === 'airbnb' ? 'selected' : '' }}>Airbnb</option>
                <option value="casa" {{ $hospedaje->tipo === 'casa' ? 'selected' : '' }}>Casa</option>
            </select>
            <label for="direccion">Direccion:</label>
            <input type="text" id="direccion" name="direccion" value="{{ $hospedaje->direccion }}">
            <label for="imagenes">Imágenes:</label>
            <input type="file" name="imagenes[]" multiple id="imagenes" accept="image/jpeg,image/png,image/jpg">
            <button type="submit">Modificar Hospedaje</button>
        </form>
    </div>
</x-layouts::app>