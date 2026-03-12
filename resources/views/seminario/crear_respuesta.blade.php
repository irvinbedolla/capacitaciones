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
                                        <label>Módulo</label>
                                        <select name="modulo_id" class="form-control" required>
                                            <option value="">Seleccione un módulo</option>
                                            @foreach($modulos as $modulo)
                                                <option value="{{ $modulo->id }}" {{ old('modulo_id') == $modulo->id ? 'selected' : '' }}>
                                                    Módulo {{ $modulo->numero_modulo }} - {{ $modulo->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">   
                                    </div>

                                <div id="contenedor-preguntas">
                                    
                                    <div class="pregunta-item border p-3 mb-4 rounded" data-index="0">
                                        
                                        <div class="form-group">
                                            <label>Pregunta</label>
                                            <textarea name="preguntas[0][texto]" class="form-control" required></textarea>
                                        </div>

                                        <label>Respuestas (seleccione la correcta)</label>
                                        
                                        @for ($i = 0; $i < 4; $i++)
                                            <div class="row w-100 mb-2">
                                                <div class="col-xs-10 col-sm-10 col-md-10">
                                                    <input type="text" name="preguntas[0][respuestas][]" class="form-control" placeholder="Respuesta {{ $i + 1 }}" required>
                                                </div>
                                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                                    <input type="radio" name="preguntas[0][respuesta_correcta]" value="{{ $i }}" required>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                    
                                </div> <div class="col-12 mb-4">
                                    <button type="button" id="btn-agregar-pregunta" class="btn btn-success">
                                        + Agregar otra pregunta
                                    </button>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary" style="background-color: #6A0F49">Guardar</button>
                                    <a href="{{ route('respuestas', $seminario->id) }}" class="btn btn-secondary">Cancelar</a>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    let indexPregunta = 1; 
    const contenedor = document.getElementById('contenedor-preguntas');
    const btnAgregar = document.getElementById('btn-agregar-pregunta');

    btnAgregar.addEventListener('click', function() {
        const htmlNuevaPregunta = `
            <div class="pregunta-item border p-3 mb-4 rounded position-relative" data-index="${indexPregunta}">
                
                <button type="button" class="btn btn-danger btn-sm position-absolute btn-eliminar" style="top: 10px; right: 10px;">
                    X Eliminar
                </button>
                
                <div class="form-group">
                    <label>Pregunta</label>
                    <textarea name="preguntas[${indexPregunta}][texto]" class="form-control" required></textarea>
                </div>

                <label>Respuestas (seleccione la correcta)</label>
                
                ${[0, 1, 2, 3].map(i => `
                    <div class="row w-100 mb-2">
                        <div class="col-xs-10 col-sm-10 col-md-10">
                            <input type="text" name="preguntas[${indexPregunta}][respuestas][]" class="form-control" placeholder="Respuesta ${i + 1}" required>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                            <input type="radio" name="preguntas[${indexPregunta}][respuesta_correcta]" value="${i}" required>
                        </div>
                    </div>
                `).join('')}
            </div>
        `;

        contenedor.insertAdjacentHTML('beforeend', htmlNuevaPregunta);
        indexPregunta++;
    });

    contenedor.addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-eliminar')) {
            e.target.closest('.pregunta-item').remove();
        }
    });
});
</script>