@extends('layouts.app_editar1')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">{{ $seminario->nombre }}</h3>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-4">{{ $modulo->nombre ?? 'Módulo 1' }}</h3>

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
                                <p class="mb-0">No hay preguntas disponibles en este modulo.</p>
                            </div>
                        @else
                            <form method="POST" action="{{ route('miscapacitaciones.guardar_respuestas_seminario', $seminario->id) }}">
                                @csrf

                                @foreach ($seminario->respuestas as $index => $pregunta)
                                    @php
                                        $items = is_array($pregunta->respuestas)
                                            ? $pregunta->respuestas
                                            : (json_decode($pregunta->respuestas, true) ?? []);
                                    @endphp

                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="mb-3">Pregunta {{ $index + 1 }}</h5>

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
                                                            required
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

                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary" style="background-color: #6A0F49; border-color: #6A0F49;">
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
