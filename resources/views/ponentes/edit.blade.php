@extends('layouts.app_editar')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Ponente</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Editar Ponente</h3>
                            
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
                            <form class='needs-validation novalidate' method='POST' action="{{route('ponentes.update', $ponente->id)}}" id="form_usuarios" enctype="multipart/form-data">>
                                <input type="hidden" name="_method" value="PATCH">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" name="nombre" class="form-control" value="{{ $ponente->nombre }}" required>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">
                                        El nombre es obligatorio.
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="semblanza">Semblanza</label>
                                            <input type="text" name="semblanza" class="form-control" value="{{ $ponente->semblanza }}" required>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">
                                        La semblanza es obligatorio.
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>Foto actual:</label>
                                            <img src="{{ asset('storage/app/ponentes/' . ($ponente->nombre . ".jpg" ?? 'default.jpg')) }}" 
                                                    alt="Foto de {{ $ponente->nombre }}" 
                                                    class="rounded-circle" 
                                                    style="width: 60px; height: 60px; object-fit: cover; border: 2px solid #4A001F;">
                                            <input type="file" name="fotografia" class="form-control">
                                            <small>Deja en blanco si no deseas cambiar la foto.</small>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">
                                        La fotografia es obligatoria.
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

<div id="menu_carga" style ="display: none;">
    <div>.</div>
    <div class="loader"></div>
</div>


@section('scripts')
    <script src="../../public/js/usuarios/usuarios.js"></script>
@endsection