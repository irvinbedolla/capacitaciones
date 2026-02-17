<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capacitaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css"> 
    <style>
        .academy-card .col-md-3 img {
            width: 100%;
            height: 250px; /* Altura fija para uniformidad */
            object-fit: cover; /* Recorta la imagen para llenar el espacio sin deformarse */
            max-width: 300px; /* Límite de ancho */
        }

        /* En móviles, permitimos que ocupe el 100% del ancho */
        @media (max-width: 767px) {
            .academy-card .col-md-3 img {
                height: 200px;
                max-width: 100%;
            }
        }
        .academy-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0,0,0,0.1) !important;
        }
    
        .avatar-container img {
            width: 100px; /* Tamaño controlado */
            height: 100px; /* Debe ser igual al ancho */
            max-width: 120px;
            object-fit: cover;
            border-radius: 50%; /* Asegura que sea un círculo */
            border: 3px solid #f8f9fa;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        /* Badge de modalidad sobre la imagen */
        .badge-modalidad {
            position: absolute;
            top: 15px;
            left: 15px;
            background: #4A001F;
            color: white;
            padding: 5px 12px;
            font-size: 0.75rem;
            font-weight: bold;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        }

        /* Tipografía y Espaciado */
        .course-main-title {
            line-height: 1.2;
        }

        /* Personalización de botones */
        .btn-outline-dark:hover {
            background-color: #4A001F;
            border-color: #4A001F;
        }

        /* Estilo para imágenes del ponente */
        .object-fit-cover {
            object-fit: cover;
        }

        /* Navbar Personalizado */
        .navbar {
            border-bottom: 3px solid #4A001F;
        }
    </style>
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                  <img src="public/assets/images/ccl-r.png" alt="Logo CNDH" width="180" height="40" class="d-inline-block align-text-top">
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('publico') }}">Seminarios</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('ponentes') }}">Ponentes</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Preguntas Frecuentes</a></li>
                        <li class="nav-item ms-lg-3">
                            <a class="btn btn-danger" href="{{ route('login') }}">
                                <i class="fas fa-user-lock me-2"></i> Iniciar
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-5 bg-white">
        <section class="container mb-5 text-center">
            <div class="py-4 px-3 rounded-4 bg-light shadow-sm border">
                <h1 class="fw-bold display-5" style="color: #4A001F;">CATÁLOGO NACIONAL DE CAPACITACIÓN - CONACENTROS</h1>
                <p class="lead text-muted mx-auto" style="max-width: 800px;">
                    Fortaleciendo el nuevo modelo de justicia laboral en México a través de la excelencia académica y la actualización constante.
                </p>
            </div>
        </section>

        <div class="container">
            <h2 class="mb-4 fw-bold border-start border-4 border-danger ps-3" style="border-color: #4A001F !important;">
                Oferta Académica Vigente
            </h2>
            
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="card academy-card shadow-sm border-0 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-md-3 d-none d-md-block position-relative">
                                <img src="public/assets/images/index/4.jpg" class="h-100 w-100 object-fit-cover" alt="Curso">
                                <div class="badge-modalidad">100% En Línea</div>
                            </div>
                            
                            <div class="col-md-6 p-4">
                                <h3 class="fw-bold mb-3 h4" style="color: #4A001F;">FUNDAMENTOS DE LA CONCILIACION Y LA JUSTICIAL LABORAL</h3>
                                <p class="text-muted small mb-4">
                                    Proporcionar los fundamentos teóricos, jurídicos e históricos del nuevo sistema de justicia laboral en México, así como las bases metodológicas de la conciliación.
                                </p>
                                
                                <div class="row g-2 mb-3">
                                    <div class="col-6 small"><i class="fas fa-calendar-check me-2 text-danger"></i><strong>Registro:</strong> 15-30 Nov</div>
                                    <div class="col-6 small"><i class="fas fa-clock me-2 text-danger"></i><strong>Duración:</strong> 40 Horas</div>
                                </div>

                                <button class="btn btn-danger px-4" data-bs-toggle="modal" data-bs-target="#Seminario1" style="background-color: #4A001F; border: none;">
                                    <i class="fas fa-info-circle me-2"></i>Ver Programa Académico
                                </button>
                            </div>

                            <div class="col-md-3 bg-light border-start p-4 text-center d-flex flex-column justify-content-center align-items-center">
                                <img src="public/assets/images/ponentes/Carmelo.jpeg" 
                                class="img-fluid rounded object-fit-cover shadow-sm mx-auto d-block" 
                                style="max-height: 250px; width: auto;" 
                                alt="Curso">
                                <h6 class="mb-0 fw-bold">Dr. Sergio Carmelo</h6>
                                <small class="text-muted">Ponente Titular</small>
                                <hr class="w-50 my-2">
                                <a href="{{ route('ponentes') }}" class="small text-decoration-none" style="color: #4A001F;">Ver Semblanza</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card academy-card shadow-sm border-0 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-md-3 d-none d-md-block position-relative">
                                <img src="public/assets/images/index/5.jpg" class="h-100 w-100 object-fit-cover" alt="Curso">
                                <div class="badge-modalidad" style="background: #2c3e50;">Modalidad Mixta</div>
                            </div>
                            <div class="col-md-6 p-4">
                                <h3 class="fw-bold mb-3 h4" style="color: #4A001F;">COMPETENCIAS TÉCNICAS Y HABILIDADES PARA LA CONCILIACIÓN</h3>
                                <p class="text-muted small mb-4">
                                    Desarrollo de competencias comunicacionales y metodológicas necesarias para la conducción efectiva de procedimientos conciliatorios con perspectiva de género.
                                </p>
                                <div class="row g-2 mb-3">
                                    <div class="col-6 small"><i class="fas fa-calendar-check me-2 text-danger"></i><strong>Registro:</strong> 1-15 Dic</div>
                                    <div class="col-6 small"><i class="fas fa-award me-2 text-danger"></i><strong>Certificación:</strong> Oficial</div>
                                </div>
                                <button class="btn btn-danger px-4" style="background-color: #4A001F; border: none;">
                                    <i class="fas fa-info-circle me-2"></i>Ver Programa Académico
                                </button>
                            </div>
                            <div class="col-md-3 bg-light border-start p-4 text-center d-flex flex-column justify-content-center align-items-center">
                                <img src="https://via.placeholder.com/80" class="rounded-circle mb-2 border shadow-sm" alt="Ponente">
                                <h6 class="mb-0 fw-bold">Mtra. Elena Ríos</h6>
                                <small class="text-muted">Ponente Titular</small>
                                <hr class="w-50 my-2">
                                <a href="#" class="small text-decoration-none" style="color: #4A001F;">Ver Semblanza</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="#" class="btn btn-outline-dark btn-lg rounded-pill px-5">Descargar Calendario 2026</a>
            </div>
        </div>
    </main>
    
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2025 | CONACENTROS.</p>
                    <small>Todos los derechos reservados.</small>
                </div>
                <div class="col-md-6 text-md-end">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#" class="text-white-50">Términos de Uso</a></li>
                        <li class="list-inline-item"><a href="#" class="text-white-50">Aviso de Privacidad</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>