<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Informe por Estado</title>

    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 12px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .box {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }

        .grid {
            width: 100%;
            display: table;
            table-layout: fixed;
        }

        .cell {
            display: table-cell;
            padding: 10px;
        }

        .primary { background: #dbeafe; }
        .success { background: #dcfce7; }
        .danger  { background: #fee2e2; }
        .warning { background: #fef9c3; }
    </style>
</head>
<body>

<h1>📊 Informe por Estado</h1>
<p>Fecha: {{ now()->format('d/m/Y') }}</p>

<div class="grid">
    <div class="cell">
        <div class="box primary">
            <strong>Total Escuelas</strong><br>
            {{ $totalEscuelas }}
        </div>
    </div>

    <div class="cell">
        <div class="box success">
            <strong>Aprobadas</strong><br>
            {{ $aprobadas }}
        </div>
    </div>

    <div class="cell">
        <div class="box danger">
            <strong>Rechazadas</strong><br>
            {{ $rechazadas }}
        </div>
    </div>

    <div class="cell">
        <div class="box warning">
            <strong>Pendientes</strong><br>
            {{ $pendientes }}
        </div>
    </div>
</div>

</body>
</html>
