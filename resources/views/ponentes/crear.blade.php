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
                            <h3 class="text-center">Registrar ponentes</h3>                    

                            <!--Se realiza el envío de datos con formulario de Laravel Collective-->
                             <form class='needs-validation novalidate' id='form_roles' method='POST' action="{{route('expedientes.store')}}" enctype='multipart/form-data'>
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        *Los campos con (*) son obligatorios.
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="nombre">*Nombre Ponente</label>
                                            <input type="text" name="nombre" class="form-control" > 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="semblanza">*Semblanza</label>
                                            <input type="text" name="semblanza" class="form-control" > 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="nombre_foto">*Nombre para fotografia</label>
                                            <input type="text" name="nombre_foto" class="form-control" > 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="fotografia">*Selecciona fotografia:</label>
                                            <input type="file" name="fotografia" accept="image/*" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="semblanza">*Ponente</label>
                                        
                                            <select class="form-control" name="id_usuario" class="form-control" required>
                                                <option value="">Selecciona un ponente</option>
                                                @if ($ponentes->count() > 0)
                                                    @foreach ($ponentes as $ponente)
                                                    
                                                    <option value= {{ $ponente->id }}> {{ $ponente->name }}</option>
                                                    @endforeach
                                                    
                                                @endif
                                            </select>
                                            <div class="invalid-feedback">
                                                El ponente es obligatorio
                                            </div>

                                        </div>
                                    </div>
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




