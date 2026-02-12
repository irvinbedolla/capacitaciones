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

                        @if($ponentes->count() > 0)
                        <div class="row">
                            @foreach($ponentes as $ponente)
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="card h-100 shadow-sm" style="border-top: 5px solid #4A001F;">
                                    <div class="text-center pt-4">
                                        {{-- Nota: Usamos 'images_ponente' que es el nombre de tu link según tu captura anterior --}}
                                        <img src="{{ asset('images_ponente/' . ($ponente->fotografia ?? 'default.jpg')) }}" 
                                            alt="Foto de {{ $ponente->nombre }}" 
                                            class="rounded-circle img-thumbnail" 
                                            style="width: 150px; height: 150px; object-fit: cover; border: 2px solid #4A001F;">
                                    </div>
                                    <div class="card-body text-center">
                                        <h5 class="card-title font-weight-bold">{{ $ponente->nombre }}</h5>
                                        <p class="card-text text-muted" style="font-size: 0.9rem;">
                                            {{ Str::limit($ponente->semblanza, 100) }}
                                        </p>
                                    </div>
                                    
                                </div>
                            </div>
                            @endforeach
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

