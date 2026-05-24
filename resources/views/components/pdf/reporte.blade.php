<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        h1 {
            color: #1a1a2e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        .header {
            background-image: url("{{ public_path('images/fondo.jpg') }}");
        }
    </style>
</head>

<body>
    <h1>{{ $titulo }}</h1>
    <p>Generado el: {{ now()->format('d/m/Y H:i') }}</p>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno['nombre'] }}</td>
                    <td>{{ $alumno['correo'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <img src="{{ public_path('images/logo.png') }}" width="150">
</body>

</html>
