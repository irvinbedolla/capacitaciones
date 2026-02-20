@extends('layouts.app_editar')

@section('content')
<section class="section">

    <div class="section-header">
        <h3 class="page__heading">
            Modulos del {{ $seminario->nombre }}
        </h3>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">
                            {{ "Modulos" }}
                        </h3>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                            </div>
                        @endif

                        @forelse ($modulos as $modulo)
                            <div class="card mb-4" style="border-left: 5px solid #6A0F49; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                <div class="card-header" style="background-color: #f8f9fa; border-bottom: 2px solid #6A0F49;">
                                    <h5 class="mb-0" style="color: #6A0F49;">
                                        <i class="fas fa-book"></i> Módulo {{ $modulo->numero_modulo }} - {{ $modulo->nombre }}
                                    </h5>
                                </div>
                                <div class="card-body">
                                    @if($modulo->contenido)
                                        <div class="mb-3">
                                            <h6 style="color: #6A0F49;"><strong>📝 Descripción:</strong></h6>
                                            <p class="text-muted">{{ $modulo->contenido }}</p>
                                        </div>
                                    @endif

                                    @php
                                        $docs = $modulo->ModulosDocumentos ?? $modulo->documentos ?? collect();
                                    @endphp

                                    @if($docs->count())
                                        <div>
                                            <h6 style="color: #6A0F49;"><strong>📄 Documentos:</strong></h6>
                                            <ul class="mb-0 pl-3">
                                                @foreach($docs as $doc)
                                                    <li class="mb-2">
                                                        <span class="text-dark">{{ $doc->nombre }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <p class="text-muted text-center">
                                No hay módulos registrados en el seminario.
                            </p>
                        @endforelse

                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
@endsection
