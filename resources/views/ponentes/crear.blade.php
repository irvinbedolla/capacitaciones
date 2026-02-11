@extends('layouts.app')

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
                            <h3 class="text-center">Registrar ponentes</h3>                    

                            <!--Se realiza el envío de datos con formulario de Laravel Collective-->
                            <form class='needs-validation novalidate' id='form_roles' method="POST" action="{{ route('ponentes.store') }}" enctype='multipart/form-data'>
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="nombre" class ="label-alineado">Nombre Completo</label>
                                                <input type="text" class="input-classic" name="nombre"  required>
                                                <div class="invalid-feedback">
                                                    El nombre es obligatorio.
                                                </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="semblanza" class ="label-alineado">Semblanza</label>
                                            <input type="text" class="input-classic" name="semblanza" required>
                                            <div class="invalid-feedback">
                                                La semblanza es obligatoria.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- public/assets/images/ponentes/-->
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="nombre_foto" class ="label-alineado">Nombre de fotografia</label>
                                            <input type="text" class="input-classic" name="nombre_foto" required>
                                            <div class="invalid-feedback">
                                                La semblanza es obligatoria.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="fotografia">*selecciona fotografia:</label>
                                            <input type="file" name="fotografia" id="fotografia" accept="image/*" required>
                                        </div>
                                    </div>
                                    <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                    
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




