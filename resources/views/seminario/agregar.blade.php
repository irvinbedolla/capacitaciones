@extends('layouts.app_editar')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Módulo</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Alta de Módulo</h3>
                             
                            <!--Se realiza la validación de campos para ver si dejó alguno vacío-->
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos!</strong>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            <!--<span class="badge badge-danger">{{ $error }}</span>-->
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            @endif

                            <!--Se realiza el envío de datos con formulario de Laravel Collective-->
                            <form class='needs-validation novalidate' id='form_modulo' method='POST' action="{{route('seminarios._agregar', $seminario->id)}}" enctype="multipart/form-data">
                                @csrf 
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nombre del módulo</label>
                                            <input type="text" class="form-control" name="name" required>
                                            <div class="invalid-feedback">
                                                El nombre es obligatorio.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="numero_modulo">Número de módulo</label>
                                            <input type="number" class="form-control" name="numero_modulo" required>
                                            <div class="invalid-feedback">
                                                Número de módulo obligatorio.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="contenido">Contenido</label>
                                            <input type="text" class="form-control" name="contenido" required>
                                            <div class="invalid-feedback">
                                                El contenido es obligatorio.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12"><br>
                                        <h5>Recursos del Módulo</h5>
                                        <button id="addRecurso" type="button" class="btn btn-info mb-3">+ Agregar recurso</button>
                                    </div>
                                        
                                    <div id="newRowRecurso"></div>
                                   
                                    <div class="col-xs-12 col-sm-12 col-md-6" id="btnGuardar" style="display: none;">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
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

<div id="menu_carga" style ="display: none;">
    <div>.</div>
    <div class="loader"></div>
</div>


@section('scripts')
<script>
    $(document).ready(function() {
        let contadorRecursos = 0;

        // Agregar recurso
        $("#addRecurso").click(function () {
            contadorRecursos++;
            var html = '';
            
            html += '<div class="recurso-item border p-3 mb-3 rounded" id="recurso_' + contadorRecursos + '">';
            html += '<div class="row">';
            
            // Selector de tipo de recurso
            html += '<div class="col-12 mb-3">';
            html += '<label for="tipoRecurso_' + contadorRecursos + '"><strong>Recurso #' + contadorRecursos + '</strong> - Seleccione el tipo:</label>';
            html += '<select name="tipo_recursos[]" id="tipoRecurso_' + contadorRecursos + '" class="form-control tipo-recurso-select" data-recurso="' + contadorRecursos + '" required>';
            html += '<option value="">-- Seleccione tipo de recurso --</option>';
            html += '<option value="pdf">PDF</option>';
            html += '<option value="url">URL</option>';
            html += '</select>';
            html += '</div>';
            
            // Contenedor para campos dinámicos según el tipo
            html += '<div class="col-12 campos-recurso" id="campos_recurso_' + contadorRecursos + '">';
            html += '</div>';
            
            // Botón eliminar
            html += '<div class="col-12 text-right">';
            html += '<button class="removeRecurso btn btn-danger btn-sm" type="button" data-recurso="' + contadorRecursos + '">';
            html += '<i class="fas fa-trash"></i> Eliminar recurso';
            html += '</button>';
            html += '</div>';
            
            html += '</div>';
            html += '</div>';
            
            $('#newRowRecurso').append(html);
                verificarRecursos();
        });

        // Manejar cambio en selector de tipo de recurso
        $(document).on('change', '.tipo-recurso-select', function() {
            var tipoRecurso = $(this).val();
            var numeroRecurso = $(this).data('recurso');
            var contenedor = $('#campos_recurso_' + numeroRecurso);
            
            contenedor.empty();
            
            if (tipoRecurso === 'pdf') {
                var htmlPdf = '';
                htmlPdf += '<div class="form-group">';
                htmlPdf += '<label for="pdf_' + numeroRecurso + '">Cargar documento PDF:</label>';
                htmlPdf += '<input type="file" name="recursos_pdf[]" id="pdf_' + numeroRecurso + '" accept="application/pdf" class="form-control-file" required>';
                htmlPdf += '<small class="form-text text-muted">Solo archivos PDF</small>';
                htmlPdf += '</div>';
                contenedor.html(htmlPdf);
            } else if (tipoRecurso === 'url') {
                var htmlUrl = '';
                htmlUrl += '<div class="form-group">';
                htmlUrl += '<label for="url_' + numeroRecurso + '">URL del recurso:</label>';
                htmlUrl += '<input type="url" name="recursos_url[]" id="url_' + numeroRecurso + '" class="form-control" placeholder="https://ejemplo.com/recurso" required>';
                htmlUrl += '<small class="form-text text-muted">Ingrese una URL válida</small>';
                htmlUrl += '</div>';
                contenedor.html(htmlUrl);
            }
            
            verificarRecursos();
        });

        // Borrar recurso
        $(document).on('click', '.removeRecurso', function () {
            var numeroRecurso = $(this).data('recurso');
            $('#recurso_' + numeroRecurso).remove();
            actualizarNumeracionRecursos();
            verificarRecursos();
        });

        // Actualizar numeración de recursos después de eliminar
        function actualizarNumeracionRecursos() {
            $('.recurso-item').each(function(index) {
                var nuevoNumero = index + 1;
                $(this).find('label:first strong').text('Recurso #' + nuevoNumero);
            });
        }

        // Verificar si hay recursos agregados para mostrar botón guardar
        function verificarRecursos() {
            var recursosCompletados = 0;
            
            $('.tipo-recurso-select').each(function() {
                if ($(this).val() !== '') {
                    recursosCompletados++;
                }
            });
            
            if (recursosCompletados > 0) {
                $('#btnGuardar').show();
            } else {
                $('#btnGuardar').hide();
            }
        }
    });
</script>
@endsection
