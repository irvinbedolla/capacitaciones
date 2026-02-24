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
                            {{-- CARD DEL MÓDULO --}}
                            <div class="card mb-4" style="border-left: 5px solid #6A0F49; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                <div class="card-header d-flex justify-content-between align-items-center"
                                     style="background-color: #f8f9fa; border-bottom: 2px solid #6A0F49;">
                                    <h5 class="mb-0" style="color: #6A0F49;">
                                        Módulo {{ $modulo->numero_modulo }} - {{ $modulo->nombre }}
                                    </h5>
                                </div>
                                <div class="card-body">
                                    @if($modulo->contenido)
                                        <div class="mb-3">
                                            <h6 style="color: #6A0F49;"><strong>📝 Descripción:</strong></h6>
                                            <p class="text-black-75">{{ $modulo->contenido }}</p>
                                        </div>
                                    @endif

                                    @php
                                        $docs = $modulo->ModulosDocumentos ?? $modulo->documentos ?? collect();
                                    @endphp

                                    <div>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 style="color: #6A0F49;" class="mb-0"><strong>📄 Documentos:</strong></h6>
                                            <button class="btn btn-sm btn-success"
                                                    data-toggle="modal"
                                                    data-target="#modalAgregarDoc-{{ $modulo->id }}">
                                                Agregar recurso
                                            </button>
                                        </div>

                                        @if($docs->count())
                                            <ul class="list-group">
                                                @foreach($docs as $doc)
                                                    @php
                                                        $nombre = $doc->nombre;
                                                        $esUrl = filter_var($nombre, FILTER_VALIDATE_URL);
                                                        if (!$esUrl) {
                                                            $partes = explode('_', $nombre, 3);
                                                            $nombreMostrar = count($partes) >= 3 ? $partes[2] : $nombre;
                                                        } else {
                                                            $nombreMostrar = $nombre;
                                                        }
                                                    @endphp
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <div>
                                                            @if($esUrl)
                                                                🔗
                                                                <a href="{{ $nombre }}" target="_blank" rel="noopener noreferrer">
                                                                    {{ $nombreMostrar }}
                                                                </a>
                                                            @else
                                                                📄
                                                                <a href="{{ asset('storage/documentos/' . $nombre) }}"
                                                                   target="_blank" rel="noopener noreferrer">
                                                                    {{ $nombreMostrar }}
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <div class="d-flex">
                                                            <button class="btn btn-sm btn-warning mr-1"
                                                                    data-toggle="modal"
                                                                    data-target="#modalEditarDoc-{{ $doc->id }}">
                                                                Editar
                                                            </button>
                                                            <form action="{{ route('modulos.destroy', $doc->id) }}"
                                                                  method="POST"
                                                                  onsubmit="return confirm('¿Estás seguro de eliminar este recurso?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger">
                                                                    Eliminar
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="text-muted">No hay documentos en este módulo.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- FIN CARD DEL MÓDULO --}}

                            {{-- ================================================ --}}
                            {{-- MODALES FUERA DEL CARD, DENTRO DEL @forelse      --}}
                            {{-- ================================================ --}}

                            @push('modals')
                            {{-- Modal Agregar --}}
                            <div class="modal fade" id="modalAgregarDoc-{{ $modulo->id }}"
                                 tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('modulos.store', $modulo->id) }}"
                                              method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header" style="background-color: #6A0F49; color: white;">
                                                <h5 class="modal-title">Agregar Recurso - Módulo {{ $modulo->numero_modulo }}</h5>
                                                <button type="button" class="close text-white" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Archivo PDF</label>
                                                    <input type="file" name="archivo" class="form-control-file" accept=".pdf">
                                                </div>
                                                <div class="text-center text-muted my-2">— o —</div>
                                                <div class="form-group">
                                                    <label>URL externa</label>
                                                    <input type="url" name="url" class="form-control" placeholder="https://...">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-success">Agregar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endpush

                            @push('modals')
                            {{-- Modales Editar --}}
                            @foreach($docs as $doc)
                                @php
                                    $nombre = $doc->nombre;
                                    $esUrl = filter_var($nombre, FILTER_VALIDATE_URL);
                                    $partes = explode('_', $nombre, 3);
                                    $nombreMostrar = (!$esUrl && count($partes) >= 3) ? $partes[2] : $nombre;
                                @endphp
                                <div class="modal fade" id="modalEditarDoc-{{ $doc->id }}"
                                     tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('modulos.update', $doc->id) }}"
                                                  method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header" style="background-color: #6A0F49; color: white;">
                                                    <h5 class="modal-title">Editar Recurso</h5>
                                                    <button type="button" class="close text-white" data-dismiss="modal">
                                                        <span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-muted">Recurso actual: <strong>{{ $nombreMostrar }}</strong></p>
                                                    <div class="form-group">
                                                        <label>Nuevo archivo PDF</label>
                                                        <input type="file" name="archivo" class="form-control-file" accept=".pdf">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>O nueva URL</label>
                                                        <input type="url" name="url" class="form-control"
                                                               placeholder="https://..."
                                                               value="{{ $esUrl ? $nombre : '' }}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-warning">Guardar cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach>
                            @endpush

                        @empty
                            <p class="text-muted text-center">
                                No hay módulos registrados en el seminario.
                            </p>
                        @endforelse

                    </div>
                </div>

                {{-- Modal Agregar --}}
                <!--div class="modal fade" id="modalAgregarDoc-{{ $modulo->id }}"
                    tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="{{ route('modulos.store', $modulo->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header" style="background-color: #6A0F49; color: white;">
                                    <h5 class="modal-title">Agregar Recurso - Módulo {{ $modulo->numero_modulo }}</h5>
                                    <button type="button" class="close text-white" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Archivo PDF</label>
                                        <input type="file" name="archivo" class="form-control-file" accept=".pdf">
                                    </div>
                                    <div class="text-center text-muted my-2">— o —</div>
                                    <div class="form-group">
                                        <label>URL externa</label>
                                        <input type="url" name="url" class="form-control" placeholder="https://...">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Agregar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Modales Editar --}}
                @foreach($docs as $doc)
                    @php
                        $nombre = $doc->nombre;
                        $esUrl = filter_var($nombre, FILTER_VALIDATE_URL);
                        $partes = explode('_', $nombre, 3);
                        $nombreMostrar = (!$esUrl && count($partes) >= 3) ? $partes[2] : $nombre;
                    @endphp
                    <div class="modal fade" id="modalEditarDoc-{{ $doc->id }}"
                            tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="{{ route('modulos.update', $doc->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header" style="background-color: #6A0F49; color: white;">
                                        <h5 class="modal-title">Editar Recurso</h5>
                                        <button type="button" class="close text-white" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-muted">Recurso actual: <strong>{{ $nombreMostrar }}</strong></p>
                                        <div class="form-group">
                                            <label>Nuevo archivo PDF</label>
                                            <input type="file" name="archivo" class="form-control-file" accept=".pdf">
                                        </div>
                                        <div class="form-group">
                                            <label>O nueva URL</label>
                                            <input type="url" name="url" class="form-control"
                                                    placeholder="https://..."
                                                    value="{{ $esUrl ? $nombre : '' }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-warning">Guardar cambios</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach-->
                            
            </div>
        </div>
    </div>

</section>
@endsection
