<x-layouts::app>
    <div>
        <form method="POST" action="{{ route('hospedajes.store') }}" enctype="multipart/form-data">
            @csrf
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="capacidad">Capacidad:</label>
            <input type="number" id="capacidad" name="capacidad" required>
            <label for="tipo">Tipo:</label>
            <select id="tipo" name="tipo" required>
                <option value="hotel">Hotel</option>
                <option value="airbnb">Airbnb</option>
                <option value="casa">Casa</option>
            </select>
            <label for="direccion">Direccion:</label>
            <input type="text" id="direccion" name="direccion">
            <label for="imagenes">Imágenes:</label>
            <input type="file" name="imagenes[]" multiple id="imagenes" accept="image/jpeg,image/png,image/jpg">
            <button type="submit">Agregar Hospedaje</button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Ciudad</th>
                <th>País</th>
                <th>Dirección</th>
                <th>Imágenes</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hospedajes as $hospedaje)
                <tr>
                    <td>{{ $hospedaje->nombre }}</td>
                    <td>{{ $hospedaje->capacidad }}</td>
                    <td>{{ $hospedaje->tipo }}</td>
                    <td>{{ $hospedaje->direccion }}</td>
                    <td>
                        @foreach ($hospedaje->imagenes as $imagen)
                            <img src="{{ asset('storage/' . $imagen) }}" width="120">
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('hospedajes.show', $hospedaje->id) }}">Modificar</a>
                        <form action="{{ route('hospedajes.destroy', $hospedaje->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este hospedaje?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layouts::app>