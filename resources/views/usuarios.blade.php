<x-layouts::app>
    <form action="/import" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <button type="submit">Importar</button>
    </form>
</x-layouts::app>