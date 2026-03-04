@extends('layouts.app_editar')

@section('content')
<style>
    .timer-bar {
        position: sticky;
        top: 0;
        z-index: 1050;
        background: #fff;
        border-bottom: 2px solid #e9ecef;
        padding: 10px 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .timer-display {
        font-size: 1.4rem;
        font-weight: 700;
        font-family: 'Courier New', monospace;
        color: #333;
    }
</style>

<section class="section">
    <div class="section-header">
        <h3 class="page__heading">{{ $seminario->nombre }}</h3>
    </div>

    {{-- Barra de temporizador --}}
    <div class="timer-bar" id="timerBar">
        <div class="d-flex justify-content-between align-items-center">
            <div>
            </div>
            <div class="text-right">
                <span class="timer-display" id="timerDisplay">
                    <span id="timerMinutes">{{ $tiempoLimite }}</span>:<span id="timerSeconds">00</span>
                </span>
            </div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-4">{{ $modulo->nombre ?? 'Módulo' }}</h3>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                            </div>
                        @endif

                        @if ($seminario->respuestas->isEmpty())
                            <div class="alert alert-info text-center">
                                <p class="mb-0">No hay preguntas asignadas a este modulo.</p>
                            </div>
                        @else
                            <form method="POST" id="formCuestionario" action="{{ route('miscapacitaciones.guardar_respuestas_seminario', [$seminario->id, $modulo->id]) }}">
                                @csrf

                                @foreach ($seminario->respuestas->shuffle() as $index => $pregunta)
                                    @php
                                        $items = is_array($pregunta->respuestas)
                                            ? $pregunta->respuestas
                                            : (json_decode($pregunta->respuestas, true) ?? []);
                                    @endphp

                                    <div class="card mb-3">
                                        <div class="card-body">

                                            <p class="mb-4">{{ $pregunta->pregunta }}</p>

                                            <div class="ml-3">
                                                @foreach ($items as $i => $texto)
                                                    <div class="custom-control custom-radio mb-2">
                                                        <input
                                                            type="radio"
                                                            class="custom-control-input"
                                                            name="respuestas[{{ $pregunta->id }}]"
                                                            id="pregunta_{{ $pregunta->id }}_{{ $i }}"
                                                            value="{{ $i }}"
                                                        >
                                                        <label class="custom-control-label" for="pregunta_{{ $pregunta->id }}_{{ $i }}">
                                                            {{ $texto }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="d-flex justify-content-between mt-4">
                                    <a href="{{ route('miscapacitaciones') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left mr-2"></i> Regresar
                                    </a>
                                    <button type="submit" class="btn btn-primary" id="btnEnviar" style="background-color: #6A0F49; border-color: #6A0F49;">
                                        <i class="fas fa-check mr-2"></i> Enviar respuestas
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var tiempoTotalSegundos = {{ (int)$tiempoLimite }} * 60;
    var tiempoRestante = tiempoTotalSegundos;
    var timerDisplay = document.getElementById('timerDisplay');
    var timerMinutes = document.getElementById('timerMinutes');
    var timerSeconds = document.getElementById('timerSeconds');
    var timerProgressBar = document.getElementById('timerProgressBar');
    var formCuestionario = document.getElementById('formCuestionario');
    var enviado = false;

    function actualizarTimer() {
        if (tiempoRestante <= 0) {
            clearInterval(intervalo);
            if (!enviado) {
                enviado = true;
                // Auto-enviar el formulario
                if (formCuestionario) {
                    // Remover el required de los radios para permitir envío parcial
                    var radios = formCuestionario.querySelectorAll('input[type="radio"]');
                    radios.forEach(function(r) { r.removeAttribute('required'); });
                    formCuestionario.submit();
                }
            }
            return;
        }

        tiempoRestante--;

        var minutos = Math.floor(tiempoRestante / 60);
        var segundos = tiempoRestante % 60;

        timerMinutes.textContent = minutos < 10 ? '0' + minutos : minutos;
        timerSeconds.textContent = segundos < 10 ? '0' + segundos : segundos;
    }

    var intervalo = setInterval(actualizarTimer, 1000);

    // Prevenir que el usuario salga sin enviar
    window.addEventListener('beforeunload', function(e) {
        if (!enviado) {
            e.preventDefault();
            e.returnValue = '¿Estás seguro de que deseas salir? Perderás tus respuestas.';
        }
    });

    // Marcar como enviado cuando se envía manualmente
    if (formCuestionario) {
        formCuestionario.addEventListener('submit', function() {
            enviado = true;
        });
    }
});
</script>
@endsection
