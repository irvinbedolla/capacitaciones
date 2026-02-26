@extends('layouts.app_editar')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-body text-center p-5">
            @if($porcentaje >= 70)
                <div class="mb-4">
                </div>
                <h3 class="text-success mb-3">Resultado del cuestionario.</h3>
            @else
                <div class="mb-4">
                </div>
                <h3 class="text-warning mb-3">Resultado del cuestionario.</h3>
            @endif

            <p class="mb-1"><strong>Seminario:</strong> {{ $seminario->nombre }}</p>
            <p class="mb-3"><strong>Módulo:</strong> {{ $modulo->nombre }}</p>

            <div class="row justify-content-center mb-4">
                <div class="col-md-3">
                    <div class="card bg-light">
                        <div class="card-body py-3">
                            <h4 class="mb-0">{{ $aciertos }} / {{ $total }}</h4>
                            <small class="text-muted">Aciertos</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-light">
                        <div class="card-body py-3">
                            <h4 class="mb-0" style="color: {{ $porcentaje >= 70 ? '#28a745' : '#dc3545' }};">{{ $porcentaje }}%</h4>
                            <small class="text-muted">Calificación</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('miscapacitaciones') }}" class="btn btn-secondary mr-2">
                    <i class="fas fa-home mr-1"></i> Regresar al inicio
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
