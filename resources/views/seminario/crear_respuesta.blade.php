@extends('layouts.app_editar')

@section('content')
<section class="section">

    <div class="section-header">
        <h3 class="page__heading">Nueva Pregunta</h3>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h3 class="text-center">
                            Seminario: {{ $seminario->nombre }}
                        </h3>

                        @if ($errors->any())
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                <strong>¡Revise los campos!</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                            </div>
                        @endif

                        <form class="needs-validation novalidate"
                              method="POST"
                              action="{{ route('guardarRespuesta', $seminario->id) }}">
                            @csrf

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Pregunta</label>
                                        <textarea name="pregunta"
                                                  class="form-control"
                                                  required>{{ old('pregunta') }}</textarea>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <label>Respuestas (seleccione la correcta)</label>
                                </div>

                                @for ($i = 0; $i < 4; $i++)
                                    <div class="col-xs-12 col-sm-12 col-md-10">
                                        <div class="form-group">
                                            <input type="text"
                                                   name="respuestas[]"
                                                   class="form-control"
                                                   placeholder="Respuesta {{ $i + 1 }}"
                                                   value="{{ old('respuestas.' . $i) }}"
                                                   required>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-2 text-center">
                                        <div class="form-group">
                                            <input type="radio"
                                                   name="respuesta_correcta"
                                                   value="{{ $i }}"
                                                   required>
                                        </div>
                                    </div>
                                @endfor

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Oportunidades</label>
                                        <input type="number"
                                               name="oportunidades"
                                               class="form-control"
                                               value="{{ old('oportunidades', 1) }}"
                                               required>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Tiempo limite (minutos).</label>
                                        <input type="number"
                                               name="tiempo"
                                               class="form-control"
                                               min="5"
                                               value="{{ old('tiempo', 5) }}"
                                               required>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit"
                                            class="btn btn-primary"
                                            style="background-color: #6A0F49">
                                        Guardar
                                    </button>

                                    <a href="{{ route('respuestas', $seminario->id) }}"
                                       class="btn btn-secondary">
                                        Cancelar
                                    </a>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
@endsection
