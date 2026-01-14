<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Informe de Escuelas</title>

    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px;
        }
        th {
            background: #f0f0f0;
        }
    </style>
</head>
<body>

<h2>Informe de Escuelas</h2>
<p>Fecha: {{ now()->format('d/m/Y') }}</p>

<table>
    <thead>
        <tr>
            <th>Escuela</th>
            <th>N° CUE</th>
            <th>Expediente</th>
            <th>Departamento</th>
            <th>Zona</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($escuelas as $escuela)
            <tr>
                <td>{{ $escuela->escuela }}</td>
                <td>{{ $escuela->n_cue }}</td>
                <td>{{ $escuela->expediente }}</td>
                <td>{{ $escuela->departamento }}</td>
                <td>{{ $escuela->zona }}</td>
                <td>{{ ucfirst($escuela->estado) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
