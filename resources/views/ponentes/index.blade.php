@extends('layouts.app_editar')
@php
    $fechaActual = date('Y-m-d');
    $id = auth()->user()->id;
@endphp
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Ponentes</h3>
        </div>
        <div class="section-body">
   
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        <a class="btn btn-warning" href="{{ route('ponentes.create')}}">Registrar Ponentes</a>

                        @if($ponentes->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped mt-2">
                                    <thead style="background-color: #4A001F;">
                                        <th style="display: none;">ID</th>
                                        <th style="color: #fff;">Nombres</th>
                                        <th style="color: #fff;">Semblanza</th>
                                        <th style="color: #fff;"></th>
                                        <th style="color: #fff;">Acciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach($ponentes as $ponente)
                                            <tr>
                                                <td style="display: none;">{{$ponente->id_usuario}}</td>
                                                <td>{{$ponente->nombre}}</td>
                                                <td>{{$ponente->semblanza}}</td>
                                                <td>
                                                    <img src="{{ asset('images_ponente/' . ($ponente->fotografia ?? 'default.jpg')) }}" 
                                                    alt="Foto de {{ $ponente->nombre }}" 
                                                    class="rounded-circle" 
                                                    style="width: 60px; height: 60px; object-fit: cover; border: 2px solid #4A001F;">
                                                </td>
                                                
                                                <td>
                                                    <a class="btn btn-info" href="{{ route('ponentes.edit', $ponente->id_usuario)}}">Editar</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('ponentes.delete', $ponente->id_usuario) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE') 
                                                        
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar?')">
                                                            Eliminar
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-center">No hay ponentes registrados.</p>
                        @endif                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection

<div id="menu_carga" style ="display: none;">
    <div>.</div>
    <div class="loader"></div>
</div>


@section('scripts')
    <script src="../public/js/estadistica/estadistica.js"></script>
@endsection