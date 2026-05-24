<x-layouts::app>

    <div>
        <form method="POST" action="{{ route('destinos.store') }}" enctype="multipart/form-data">
            @csrf
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="ciudad">Ciudad:</label>
            <input type="text" id="ciudad" name="ciudad" required>
            <label for="pais">País:</label>
            <input type="text" id="pais" name="pais" required>
            <label for="direccion">Direccion:</label>
            <input type="text" id="direccion" name="direccion">
            <label for="imagenes">Imágenes:</label>
            <input type="file" name="imagenes[]" multiple id="imagenes" accept="image/jpeg,image/png,image/jpg">
            <button type="submit">Agregar Destino</button>
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
            </tr>
        </thead>
        <tbody>
            @foreach ($destinos as $destino)
                <tr>
                    <td>{{ $destino->nombre }}</td>
                    <td>{{ $destino->ciudad }}</td>
                    <td>{{ $destino->pais }}</td>
                    <td>{{ $destino->direccion }}</td>
                    <td>
                        @foreach ($destino->imagenes as $imagen)
                            <img src="{{ asset('storage/' . $imagen) }}" width="120">
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-layouts::app>