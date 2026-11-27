
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de pacientes</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            color: #6b21a8;
        }

        p {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #6b21a8;
            color: white;
        }

        th, td {
            border: 1px solid #999;
            padding: 7px;
            text-align: left;
        }
    </style>
</head>

<body>

    <h2>GARCÍA ÓPTICAS</h2>
    <p>Reporte de pacientes registrados</p>

    <table>
        <thead>
            <tr>
                <th>Fecha de ingreso</th>
                <th>Nombre completo</th>
                <th>Edad</th>
                <th>Celular</th>
                <th>Dirección</th>
                <th>Observaciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->fecha_ingreso }}</td>
                    <td>{{ $paciente->nombre_completo }}</td>
                    <td>{{ $paciente->edad }}</td>
                    <td>{{ $paciente->celular }}</td>
                    <td>{{ $paciente->direccion }}</td>
                    <td>{{ $paciente->observaciones }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
