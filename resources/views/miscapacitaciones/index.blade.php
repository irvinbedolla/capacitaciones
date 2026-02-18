@extends('layouts.app')

@section('content')
<style>
    /* style.css o dentro de <style> */
.tab {
    /* Permite que el contenido se desborde */
    overflow-x: auto; 
    /* Oculta la barra de desplazamiento estándar en algunos navegadores */
    -ms-overflow-style: none; /* IE and Edge */
    scrollbar-width: none; /* Firefox */
    /* Asegura que los elementos permanezcan en una sola línea */
    white-space: nowrap; 
    /* Elimina la barra de desplazamiento en Chrome/Safari */
    padding-bottom: 5px; /* Espacio extra para que no se corte la sombra si hubiera */
}

/* Opcional: Eliminar la barra de desplazamiento visualmente en navegadores basados en WebKit (Chrome, Safari) */
.tab::-webkit-scrollbar {
    display: none;
}

/* Si quieres que los botones se vean un poco más anchos y no solo lo que ocupa el texto */
.tab .btn {
    min-width: 120px; /* Asegura un ancho mínimo legible */
}
.h5 {
    style="text-align: justify;"
}


/* Paleta de Colores Principal */
            :root {
                --primary-color: #4A001F; /* El guinda de tu tabla original */
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

                            
                            <div class="row">
                                    <div class="col-12 mb-4">
                                        <div class="card lms-card shadow-sm border-0">
                                            <div class="row no-gutters">
                                                <div class="col-md-4 lms-speaker-sidebar text-center p-4">
                                                    <div class="speaker-badge">Ponente Magistral</div>
                                                    <div class="avatar-container mb-3">
                                                        <img src="../public/assets/images/ponentes/Carmelo.jpeg" alt="Ponente" class="img-fluid rounded-circle shadow">
                                                    </div>
                                                    <h4 class="speaker-name">Dr. Sergio Carmelo Dominguez</h4>
                                                    <p class="speaker-title text-muted">Director FDCS</p>
                                                    <hr class="speaker-divider">
                                                    <div class="course-meta">
                                                        <small class="text-white-50 d-block">Periodo de capacitación:</small>
                                                        <span class="badge badge-light-outline">03-01-2025 al 03-02-2025</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-8 p-4">
                                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                                        <div>
                                                            <span class="badge badge-soft-primary mb-2">Módulo 1</span>
                                                            <h2 class="course-main-title">Historia y evolución del derecho laboral mexicano</h2>
                                                        </div>
                                                        <div class="dropdown">
                                                            <button class="btn btn-light btn-sm rounded-circle" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="{{ route('capacitaciones.modulos', 1)}}">Configurar Módulos</a>
                                                                <form method="POST" action="{{ route('capacitaciones.destroy', 1) }}">
                                                                    @csrf @method('DELETE')
                                                                    <button class="dropdown-item text-danger" type="submit">Eliminar Curso</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <p class="text-muted mb-4">Explora los ejes temáticos y materiales de este módulo educativo diseñado para la excelencia institucional.</p>

                                                    <div class="accordion" id="accordionCourse1">
                                                        <div class="lms-topic-item mb-2">
                                                            <button class="btn btn-block lms-topic-btn collapsed" data-toggle="collapse" data-target="#topic11">
                                                                <span class="topic-number">I</span> Antecedentes constitucionales del derecho laboral
                                                                <i class="fas fa-chevron-down float-right mt-1"></i>
                                                            </button>
                                                            <div id="topic11" class="collapse" data-parent="#accordionCourse1">
                                                                <div class="p-3 bg-light border-top rounded-bottom">
                                                                    Aquí van los recursos, videos o lecturas del tema I.
                                                                </div>
                                                                <div class="p-3 bg-light border-top rounded-bottom">
                                                                    Aquí van los recursos, videos o lecturas del tema I.
                                                                </div>
                                                                <div class="p-3 bg-light border-top border-bottom text-right">
                                                                    <a href="{{ route('miscapacitaciones.responder_seminario', 1) }}" class="btn btn-primary btn-sm" style="background-color: #6A0F49; border-color: #6A0F49;">
                                                                        <i class="fas fa-pencil mr-1"></i> Contestar cuestionario
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="lms-topic-item mb-2">
                                                            <button class="btn btn-block lms-topic-btn collapsed" data-toggle="collapse" data-target="#topic21">
                                                                <span class="topic-number">II</span> Las reformas laborales en México: contexto y alcances
                                                                <i class="fas fa-chevron-down float-right mt-1"></i>
                                                            </button>
                                                            <div id="topic21" class="collapse" data-parent="#accordionCourse1">
                                                                <div class="p-3 bg-light border-top rounded-bottom">
                                                                    Contenido detallado del tema II.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="lms-topic-item mb-2">
                                                            <button class="btn btn-block lms-topic-btn collapsed" data-toggle="collapse" data-target="#topic11">
                                                                <span class="topic-number">III</span> De las Juntas de Conciliación y Arbitraje al nuevo modelo
                                                                <i class="fas fa-chevron-down float-right mt-1"></i>
                                                            </button>
                                                            <div id="topic11" class="collapse" data-parent="#accordionCourse1">
                                                                <div class="p-3 bg-light border-top rounded-bottom">
                                                                    Aquí van los recursos, videos o lecturas del tema III.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="lms-topic-item mb-2">
                                                            <button class="btn btn-block lms-topic-btn collapsed" data-toggle="collapse" data-target="#topic11">
                                                                <span class="topic-number">IV</span> Comparativo entre el sistema anterior y el actual
                                                                <i class="fas fa-chevron-down float-right mt-1"></i>
                                                            </button>
                                                            <div id="topic11" class="collapse" data-parent="#accordionCourse1">
                                                                <div class="p-3 bg-light border-top rounded-bottom">
                                                                    Aquí van los recursos, videos o lecturas del tema IV.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="mt-4 d-flex gap-2">
                                                        <a href="{{ route('capacitaciones.calificaciones', 1)}}" class="btn btn-outline-custom mr-2">
                                                            <i class="fas fa-star mr-1"></i> Calificaciones
                                                        </a>
                                                        <a href="{{ route('capacitaciones.calificaciones', 1)}}" class="btn btn-outline-custom mr-2">
                                                            <i class="fas fa-star mr-1"></i> Inicar Módulo
                                                        </a>
                                                        @if("Teminsd" == "Terminado")
                                                            <a href="{{ route('capacitaciones.addpersonas', 1)}}" class="btn btn-custom">
                                                                <i class="fas fa-user-plus mr-1"></i> Inscribir Participantes
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


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
    <script>
        const detalles = document.getElementById("detalles").style.display = 'none';
        const solicitante = document.getElementById("solicitante").style.display = 'none';
        const documentos = document.getElementById("documentos").style.display = 'none';
        const observaciones = document.getElementById("observaciones").style.display = 'none';

        function openCity(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;
        
            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
            }
        
            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
        
            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
@endsection