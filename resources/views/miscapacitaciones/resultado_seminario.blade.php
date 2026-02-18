@extends('layouts.app_editar1')

@section('content')
<div class="container mt-5">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">¡Evaluación completada!</h4>
        <p>
            Has respondido correctamente <strong>{{ $aciertos }}</strong> de <strong>{{ $total }}</strong> preguntas.
        </p>
        <p class="mb-0">
            <strong>Calificación: {{ $porcentaje }}%</strong>
        </p>
        <hr>
        <a href="{{ route('miscapacitaciones') }}" class="btn btn-primary btn-sm">
            Regresar al inicio
        </a>
        <a href="{{ route('miscapacitaciones') }}" class="btn btn-sm ml-2" style="background-color: #6A0F49; color: white; border-color: #6A0F49;">
            Siguiente sección
        </a>
    </div>
</div>
@endsection
