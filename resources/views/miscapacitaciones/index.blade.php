@extends('layouts.app')

@section('content')
<style>
    .tab {
        overflow-x: auto;
        -ms-overflow-style: none;
        scrollbar-width: none;
        white-space: nowrap;
        padding-bottom: 5px;
    }

    .tab::-webkit-scrollbar {
        display: none;
    }

    .tab .btn {
        min-width: 120px;
    }

    /* Paleta de Colores Principal */
    :root {
        --primary-color: #4A001F;
        --accent-color: #7A1D3A;
        --text-muted: #6c757d;
    }

    .lms-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 15px !important;
        overflow: hidden;
    }

    .lms-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
    }

    /* Sidebar del Ponente */
    .lms-speaker-sidebar {
        background: linear-gradient(180deg, var(--primary-color) 0%, var(--accent-color) 100%);
        color: white;
    }

    .speaker-badge {
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: 2px;
        background: rgba(255,255,255,0.2);
        display: inline-block;
        padding: 2px 12px;
        border-radius: 20px;
        margin-bottom: 15px;
    }

    .avatar-container img {
        width: 120px;
        height: 120px;
        border: 4px solid rgba(255,255,255,0.3);
        object-fit: cover;
    }

    .speaker-name { font-weight: 700; margin-bottom: 0; }
    .speaker-title { color: rgba(255,255,255,0.7) !important; font-size: 0.9rem; }

    /* Botones de Temario */
    .lms-topic-btn {
        text-align: left;
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        padding: 12px 15px;
        font-weight: 600;
        color: #444;
        transition: all 0.2s;
    }

    .lms-topic-btn:hover, .lms-topic-btn:not(.collapsed) {
        background: #fff;
        border-left: 4px solid var(--primary-color);
        color: var(--primary-color);
    }

    .topic-number {
        background: var(--primary-color);
        color: white;
        width: 25px;
        height: 25px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        font-size: 12px;
        margin-right: 10px;
    }

    /* Botones de acción personalizados */
    .btn-custom {
        background-color: var(--primary-color);
        color: white;
        border-radius: 8px;
        padding: 8px 20px;
    }

    .btn-outline-custom {
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
        font-weight: 700;
        border-radius: 8px;
    }

    .doc-item {
        display: flex;
        align-items: center;
        padding: 8px 12px;
        border-bottom: 1px solid #eee;
    }

    .doc-item:last-child {
        border-bottom: none;
    }

    .doc-item i {
        margin-right: 10px;
        color: var(--primary-color);
    }

    .badge-completado {
        background-color: #28a745;
        color: white;
        font-size: 11px;
        padding: 4px 10px;
        border-radius: 12px;
    }

    .badge-pendiente {
        background-color: #ffc107;
        color: #333;
        font-size: 11px;
        padding: 4px 10px;
        border-radius: 12px;
    }
</style>

    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"></h3>
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

                            @if($seminarios->isEmpty())
                                <div class="alert alert-info text-center">
                                    <p class="mb-0">No hay seminarios disponibles por el momento.</p>
                                </div>
                            @endif

                            <div class="row">
                                @foreach($seminarios as $seminario)
                                    <div class="col-12 mb-4">
                                        <div class="card lms-card shadow-sm border-0">
                                            <div class="row no-gutters">
                                                {{-- ===== Apartado del ponente ===== --}}
                                                <div class="col-md-4 lms-speaker-sidebar text-center p-4">
                                                    <div class="speaker-badge">Ponente Magistral</div>
                                                    <div class="avatar-container mb-3">
                                                        <img src="{{ optional($seminario->ponente->fotografia)->fotografia ? asset('storage/app/public/ponentes/' . $seminario->ponente->fotografia->fotografia) : asset('assets/images/ponentes/default.png') }}" alt="Avatar del ponente" class="rounded-circle">
                                                    </div>
                                                    <h4 class="speaker-name">{{ $seminario->ponente->nombre ?? 'indefinido ' }}</h4>
                                                    <p class="speaker-title text-muted">{{ $seminario->ponente->semblanza ?? 'Buen dia' }}</p>
                                                    <hr class="speaker-divider">
                                                    <div class="course-meta">
                                                        <small class="text-white-50 d-block">Periodo de capacitación:</small>
                                                        <span class="badge badge-light-outline">
                                                            {{ \Carbon\Carbon::parse($seminario->fecha_inicial)->format('d-m-Y') }}
                                                            al
                                                            {{ \Carbon\Carbon::parse($seminario->fecha_final)->format('d-m-Y') }}
                                                        </span>
                                                    </div>
                                                </div>

                                                {{-- ===== Panel Principal con Modulos ===== --}}
                                                <div class="col-md-8 p-4">
                                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                                        <div>
                                                            <h2 class="course-main-title">{{ $seminario->nombre }}</h2>
                                                        </div>
                                                    </div>

                                                    @if($seminario->modulos->isEmpty())
                                                        <div class="alert alert-warning">
                                                            <i class="fas fa-info-circle mr-1"></i> Este seminario aun no tiene contenido.
                                                        </div>
                                                    @else
                                                        <div class="accordion" id="accordionSeminario{{ $seminario->id }}">
                                                            @foreach($seminario->modulos as $index => $modulo)
                                                                @php
                                                                    $claveProgreso = $seminario->id . '-' . $modulo->id;
                                                                    $progresoModulo = $progreso[$claveProgreso] ?? null;
                                                                    $estaCompletado = $progresoModulo && $progresoModulo->estatus === 'completado';
                                                                @endphp
                                                                <div class="lms-topic-item mb-2">
                                                                    <button class="btn btn-block lms-topic-btn collapsed" data-toggle="collapse" data-target="#topic_{{ $seminario->id }}_{{ $modulo->id }}">
                                                                        {{ $modulo->nombre }}
                                                                        <i class="fas fa-chevron-down float-right mt-1"></i>
                                                                    </button>
                                                                    <div id="topic_{{ $seminario->id }}_{{ $modulo->id }}" class="collapse" data-parent="#accordionSeminario{{ $seminario->id }}">
                                                                        {{-- Documentos del modulo --}}
                                                                        @if($modulo->documentos->isNotEmpty())
                                                                            <div class="p-3 bg-light border-top">
                                                                                <strong class="d-block mb-2"><i class="fas fa-folder-open mr-1"></i> Materiales del módulo:</strong>
                                                                                @foreach($modulo->documentos as $documento)
                                                                                    <div class="doc-item">
                                                                                        @if($documento->tipo === 'pdf')
                                                                                            <i class="fas fa-file-pdf"></i>
                                                                                            <a href="{{ asset('documentos_modulo/' . $documento->nombre) }}" target="_blank">
                                                                                                {{ $documento->nombre }}
                                                                                            </a>
                                                                                        @elseif($documento->tipo === 'url')
                                                                                            <i class="fas fa-link"></i>
                                                                                            <a href="{{ $documento->nombre }}" target="_blank" rel="noopener">
                                                                                                {{ $documento->nombre }}
                                                                                            </a>
                                                                                        @else
                                                                                            <i class="fas fa-file"></i>
                                                                                            <a href="{{ asset('documentos_modulo/' . $documento->nombre) }}" target="_blank">
                                                                                                {{ $documento->nombre }}
                                                                                            </a>
                                                                                        @endif
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endif

                                                                        {{-- Boton del cuestionario --}}
                                                                        @if($modulo->respuestas->count() > 0)
                                                                            <div class="p-3 bg-light border-top border-bottom text-right">
                                                                                <a href="{{ route('miscapacitaciones.responder_seminario', [$seminario->id, $modulo->id]) }}" class="btn btn-primary btn-sm" style="background-color: #6A0F49; border-color: #6A0F49;">
                                                                                        <i class="fas fa-pencil-alt mr-1"></i> Contestar cuestionario
                                                                                    </a>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pagination justify-content-end">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Accordion funciona nativamente con Bootstrap collapse
    </script>
@endsection
