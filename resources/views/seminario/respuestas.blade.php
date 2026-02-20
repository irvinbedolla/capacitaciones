@extends('layouts.app_editar')

@section('content')
<section class="section">

    <div class="section-header">
        <h3 class="page__heading">
            Preguntas del Seminario
        </h3>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">
                            {{ $seminario->nombre }}
                        </h3>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="mb-3 text-right">
                            <a href="{{ route('crearRespuesta', $seminario->id) }}"
                               class="btn btn-primary"
                               style="background-color: #6A0F49">
                                Agregar pregunta
                            </a>
                        </div>

                        @forelse ($modulos as $modulo)
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2" style="color: #6A0F49;">
                                    Módulo {{ $modulo->numero_modulo }} - {{ $modulo->nombre }}
                                </h5>

                                @php
                                    $preguntasModulo = $respuestas->where('modulo_id', $modulo->id);
                                @endphp

                                @forelse ($preguntasModulo as $respuesta)
                                    <div class="card mb-3">
                                        <div class="card-body">

                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <strong>{{ $respuesta->pregunta }}</strong>
                                                </div>
                                                <div>
                                                    <a href="{{ route('respuestas.editar', $respuesta->id) }}" class="btn btn-info btn-sm">Editar</a>
                                                    <form action="{{ route('respuestas.eliminar', $respuesta->id) }}" method="POST" style="display:inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar pregunta?')">Eliminar</button>
                                                    </form>
                                                </div>
                                            </div>

                                            @php
                                                $items = is_array($respuesta->respuestas)
                                                    ? $respuesta->respuestas
                                                    : (json_decode($respuesta->respuestas, true) ?? []);
                                            @endphp
                                            <ul class="mt-2">
                                                @foreach ($items as $i => $texto)
                                                    <li
                                                        @if ($i == $respuesta->respuesta_correcta)
                                                            style="color: green; font-weight: bold;"
                                                        @endif
                                                    >
                                                        {{ $texto }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted">
                                        No hay preguntas en este módulo.
                                    </p>
                                @endforelse
                            </div>
                        @empty
                            <p class="text-muted text-center">
                                No hay módulos registrados en el seminario.
                            </p>
                        @endforelse

                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
@endsection
