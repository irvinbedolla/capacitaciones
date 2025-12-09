@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Mis capacitaciones</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if (\Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <ul>
                                        <li>{!! \Session::get('success') !!}</li>
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {{-- --- INICIO DEL CÓDIGO A AGREGAR --- --}}
                            
                            <h4 class="mb-3">

                            SEMINARIO 1: <br></h4>
                        <h5>FUNDAMENTOS DE LA CONCILIACIÓN Y LA JUSTICIA LABORAL.<br><br>
                                    Objetivo: Proporcionar a las y los participantes los fundamentos teóricos, jurídicos e históricos del nuevo sistema de justicia 
                                    laboral en México, así como las bases conceptuales y metodológicas de la conciliación como mecanismo alternativo de solución de conflictos.
</h4>
                            <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownCapacitaciones" data-bs-toggle="dropdown" aria-expanded="false">
                                    Ver Modulos
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownCapacitaciones">
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalModulo1">Módulo 1: Introducción</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalModulo2">Módulo 2: Desarrollo</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalModulo3">Módulo 3: Conclusiones</a></li>
                                </ul>
                            </div>

                            @include('partials.modal_modulo', ['id' => 'modalModulo1', 'titulo' => 'Módulo 1: Introducción', 'contenido' => 'Aquí va la información detallada y la semblanza del primer módulo.'])
                            
                            @include('partials.modal_modulo', ['id' => 'modalModulo2', 'titulo' => 'Módulo 2: Desarrollo', 'contenido' => 'Contenido específico sobre el desarrollo de temas del segundo módulo.'])
                            
                            @include('partials.modal_modulo', ['id' => 'modalModulo3', 'titulo' => 'Módulo 3: Conclusiones', 'contenido' => 'Resumen y conclusiones del tercer módulo.'])

                            {{-- --- FIN DEL CÓDIGO A AGREGAR --- --}}

                            <!-- Centramos la paginación a la derecha-->
                            <div class="pagination justify-content-end">
                            </div>                        
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
    <script src="../public/js/estadistica/estadistica.js"></script>
@endsection