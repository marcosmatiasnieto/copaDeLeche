@extends('layouts.app')

@section('title', 'Informe General')

@section('content')
    <div class="container mt-4">

        <h1 class="fw-bold mb-4">📊 Informe Por Estado</h1>

        <div class="row">

            <div class="col-md-3">
                <div class="card text-bg-primary mb-3">
                    <div class="card-body text-center">
                        <h5>Total Escuelas</h5>
                        <h2>{{ $totalEscuelas }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-bg-success mb-3">
                    <div class="card-body text-center">
                        <h5>Aprobadas</h5>
                        <h2>{{ $aprobadas }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-bg-danger mb-3">
                    <div class="card-body text-center">
                        <h5>Rechazadas</h5>
                        <h2>{{ $rechazadas }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-bg-warning mb-3">
                    <div class="card-body text-center">
                        <h5>Pendientes</h5>
                        <h2>{{ $pendientes }}</h2>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">📈 Escuelas por estado</h5>
                    <div style="height: 300px;">
                        <canvas id="estadoChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
        <a href="{{ route('informes.pdf.estado') }}" class="btn btn-danger mb-3" target="_blank">
            📄 Descargar PDF
        </a>
    </div>


@endsection
@push('scripts')
    <script>
        const ctx = document.getElementById('estadoChart');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Aprobadas', 'Rechazadas', 'Pendientes'],
                datasets: [{
                    data: [
                        {{ $aprobadas }},
                        {{ $rechazadas }},
                        {{ $pendientes }}
                    ],
                    backgroundColor: [
                        'rgba(25, 135, 84, 0.8)',
                        'rgba(220, 53, 69, 0.8)',
                        'rgba(255, 193, 7, 0.8)'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
@endpush
