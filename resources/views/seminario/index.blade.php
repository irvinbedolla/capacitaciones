    @extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Capacitaciones</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-usuario')
                                <a class="btn btn-warning mb-1" href="{{ route('nuevoSeminario') }}" onclick=crear_seminario();> Nuevo seminario</a>
                            @endcan    

                            @can('ver-curso')
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped mt-1">
                                        <thead style="background-color: #4A001F;">
                                            <th style="display: none;">ID</th>
                                            <th style="color: #fff;">Nombre</th>
                                            <th style="color: #fff;">Fecha inicial</th>
                                            <th style="color: #fff;">Fecha final</th>
                                            <th style="color: #fff;">Acciones</th>
                                            <th style="color: #fff;">Módulos</th>
                                        </thead>
                                        <tbody>
                                            @foreach($seminarios as $seminario)
                                                <tr>
                                                    <td style="display: none;">{{$seminario->id}}</td>
                                                    <td>{{$seminario->nombre}}</td>
                                                    <td>{{$seminario->fecha_inicial}}</td>
                                                    <td>{{$seminario->fecha_final}}</td>
                                                    <td>
                                                        @can('editar-curso')
                                                            <a class="btn btn-info mb-1" href="{{ route('editarSeminario', $seminario->id) }}" onclick=editar_seminario();>Editar</a>
                                                        @endcan
                                                        @can('borrar-curso')
                                                            <form method="POST" action="{{ route('eliminarSeminario', $seminario->id) }}">
                                                            @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger mb-1" onclick="return confirm('¿Está seguro de eliminar este seminario?')"; type="submit">Eliminar</button>
                                                            </form>
                                                        @endcan
                                                        @can('ver-curso')
                                                            <a class="btn btn-success mb-1" href="{{ route('respuestas', $seminario->id) }}" onclick=ver_respuestas();>Ver respuestas</a>
                                                        @endcan
                                                    </td>   
                                                    <td>    
                                                        <a class="btn btn-info mb-1" href="{{ route('agregarModulo', $seminario->id) }}" onclick=agregar_modulo();>Agregar Módulo</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endcan
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

