¿@extends('layouts.app_editar')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Seminario</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Editar Seminario</h3>
                            
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
                            <form class='needs-validation novalidate' method='POST' action="{{route('seminarios.actualizar', $seminario->id)}}" id="form_seminarios">
                                <input type="hidden" name="_method" value="PATCH">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            <input type="text" name="name" class="form-control" value="{{ $seminario->nombre }}" required>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">
                                        El nombre es obligatorio.
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="init_date">Fecha inicial</label>
                                            <input type="date" name="init_date" class="form-control" value="{{ $seminario->fecha_inicial }}" required>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">
                                        La fecha inicial es obligatoria.
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="end_date">Fecha final</label>
                                            <input type="date" name="end_date" class="form-control" value="{{ $seminario->fecha_final }}" required>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">
                                        La fecha final es obligatoria.
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="id_ponente">Ponente</label>
                                            <select name="id_ponente" class="form-control" required>
                                                <option value="">-- Selecciona un ponente --</option>
                                                @foreach($ponentes as $ponente)
                                                    <option value="{{ $ponente->id }}" {{ $seminario->id_ponente == $ponente->id ? 'selected' : '' }}>{{ $ponente->nombre }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">El ponente es obligatorio.</div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-primary" style="background-color: #6A0F49">Guardar</button>
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
    <script src="../../public/js/usuarios/usuarios.js"></script>
@endsection