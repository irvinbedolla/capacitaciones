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

                                    

                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="documento">Cargar documento:</label>
                                            <input type="file" name="documento" accept="application/pdf" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="url">URL</label>
                                            <input type="text" maxlength="100" class="form-control" name="url" required>
                                            <div class="invalid-feedback">
                                                La URL es obligatoria.
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="col-xs-12 col-sm-12 col-md-6">
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
    let contadorCampos = 0;
    
    document.getElementById('agregar-campos').addEventListener('click', function() {
        contadorCampos++;
        
        const nuevosCampos = `
            <div class="row campos-grupo" id="grupo-${contadorCampos}">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="documento">Cargar documento:</label>
                        <input type="file" name="documento[]" accept="application/pdf" class="form-control">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" maxlength="100" class="form-control" name="url[]">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-1">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <button type="button" class="btn btn-danger btn-block eliminar-campos" data-grupo="${contadorCampos}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
        
        document.getElementById('campos-dinamicos').insertAdjacentHTML('beforeend', nuevosCampos);
    });

    // Delegación de eventos para eliminar campos
    document.getElementById('campos-dinamicos').addEventListener('click', function(e) {
        if (e.target.classList.contains('eliminar-campos') || e.target.parentElement.classList.contains('eliminar-campos')) {
            const boton = e.target.classList.contains('eliminar-campos') ? e.target : e.target.parentElement;
            const grupoId = boton.getAttribute('data-grupo');
            document.getElementById('grupo-' + grupoId).remove();
        }
    });
</script>
@endsection
