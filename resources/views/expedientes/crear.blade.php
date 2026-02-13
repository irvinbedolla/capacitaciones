@extends('layouts.app_editar')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Mis datos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Actualizar mis datos</h3>
                            
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
                            <form class='needs-validation novalidate' id='form_roles' method='POST' action="{{route('expedientes.store')}}" enctype='multipart/form-data'>
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        *Los campos con (*) son obligatorios.
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name">*Nombre</label>
                                            <input type="text" name="nombre" class="form-control" value="{{ $usuario->name }}" readonly> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="email">*Email</label>
                                            <input type="text" name="email" class="form-control" value="{{ $usuario->email }}" readonly> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="password">*Cargo</label>
                                            <input type="text" name="cargo" class="form-control" 
                                            value="{{ $persona != NULL ? $persona->cargo : '' }} " required> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="confirm-password">*Area de adscripción</label>
                                            <input type="text" name="area_adcripcion" class="form-control" 
                                            value="{{ $persona != NULL ? $persona->area_adcripcion : '' }} "required> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name">*Telefono</label>
                                            <input type="text" name="telefono" class="form-control" 
                                            value="{{ $persona != NULL ? $persona->telefono : '' }} " maxlength=10 required> 
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name">*Ultimo grado de estudio</label>
                                            <input type="text" name="estudio_maximo" class="form-control" 
                                            value="{{ $persona != NULL ? $persona->estudio_maximo : '' }} " maxlength=10 required> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name">*Titulo universitario</label>
                                            <input type="text" name="tilulo_universitario" class="form-control" 
                                            value="{{ $persona != NULL ? $persona->tilulo_universitario : '' }} " maxlength=10 required> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name">*Especialidades</label>
                                            <input type="text" name="especialidades" class="form-control" 
                                            value="{{ $persona != NULL ? $persona->especialidades : '' }} " maxlength=10 required> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name">*Diplomados</label>
                                            <input type="text" name="diplomados" class="form-control" 
                                            value="{{ $persona != NULL ? $persona->diplomados : '' }} " maxlength=10 required> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name">*Seminarios</label>
                                            <input type="text" name="seminarios" class="form-control" 
                                            value="{{ $persona != NULL ? $persona->seminarios : '' }} " maxlength=10 required> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name">*Cursos</label>
                                            <input type="text" name="cursos" class="form-control" 
                                            value="{{ $persona != NULL ? $persona->cursos : '' }} " maxlength=10 required> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name">*Acciones de desarrollo</label>
                                            <input type="text" name="acciones_desarrollo" class="form-control" 
                                            value="{{ $persona != NULL ? $persona->acciones_desarrollo : '' }} " maxlength=10 required> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name">*Observaciones</label>
                                            <input type="text" name="observaciones" class="form-control" 
                                            value="{{ $persona != NULL ? $persona->observaciones : '' }} " maxlength=10 required> 
                                        </div>
                                    </div>
                                    <!--div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                                <label for="archivo_constancia">*Selecciona un archivo:</label>
                                                <input type="file" name="constancia" id="archivo_constancia" accept="image/*, .pdf,"/>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            
                                                <label for="archivo_dentificacion">*Selecciona un archivo:</label>
                                                <input type="file" name="identificacion" id="archivo_dentificacion" accept="image/*, .pdf,"/>

                                        </div>
                                    </div-->
                                </div>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12">
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

