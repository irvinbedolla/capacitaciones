<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réplica CNDH - Cursos Virtuales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css"> 
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
                        <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
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

    <main class="py-5 bg-light">
        <div class="container">
            
            <section class="cursos-destacados">
                <h2 class="mb-4 border-bottom pb-2">Próximos Cursos Disponibles</h2>
                
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title text-success">Curso Básico | Abierto</h5>
                                <h3 class="card-subtitle mb-2 fw-bold">FUNDAMENTOS DE LA CONCILIACION Y LA JUSTICIAL LABORAL</h3>
                                <p class="card-text">Objetivo: Proporcionar a 
                                  las y los participantes 
                                  los fundamentos 
                                  teóricos, jurídicos e 
                                  históricos del nuevo 
                                  sistema de justicia 
                                  laboral en México, así 
                                  como las bases 
                                  conceptuales y 
                                  metodológicas de la 
                                  conciliación como 
                                  mecanismo alternativo 
                                  de solución de 
                                  conflictos.</p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <ul class="list-unstyled small">
                                    <li><i class="far fa-calendar-alt text-muted me-2"></i> **Registro:** 15 al 30 de Noviembre</li>
                                    <li><i class="fas fa-graduation-cap text-muted me-2"></i> **Modalidad:** 100% en Línea</li>
                                </ul>
                                <a href="#" class="btn btn-outline-primary w-100 mt-2">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title text-success">Diplomado | Nuevo</h5>
                                <h3 class="card-subtitle mb-2 fw-bold">COMPETENCIAS TÉCNICAS Y HABILIDADES PARA LA CONCILIACIÓN</h3>
                                <p class="card-text">Objetivo: Desarrollar en 
                                  las y los participantes 
                                  las competencias 
                                  técnicas, 
                                  comunicacionales y 
                                  metodológicas 
                                  necesarias para la 
                                  conducción efectiva de 
                                  procedimientos 
                                  conciliatorios, con 
                                  énfasis en habilidades 
                                  blandas, perspectiva de 
                                  género y atención 
                                  diferenciada.</p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <ul class="list-unstyled small">
                                    <li><i class="far fa-calendar-alt text-muted me-2"></i> **Registro:** 1 al 15 de Diciembre</li>
                                    <li><i class="fas fa-graduation-cap text-muted me-2"></i> **Modalidad:** Mixta</li>
                                </ul>
                                <a href="#" class="btn btn-outline-primary w-100 mt-2">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title text-success">Curso | Próximo</h5>
                                <h3 class="card-subtitle mb-2 fw-bold">EVALUACIÓN, RETOS Y CULTURA DE LA CONCILIACIÓN LABORAL</h3>
                                <p class="card-text">Objetivo: Analizar los desafíos actuales del sistema de justicia laboral, fortalecer la cultura de paz y justicia restaurativa, 
                                  y desarrollar capacidades para la evaluación y diagnóstico institucional con perspectiva de género y derechos humanos..</p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <ul class="list-unstyled small">
                                    <li><i class="far fa-calendar-alt text-muted me-2"></i> **Registro:** Enero 2026</li>
                                    <li><i class="fas fa-graduation-cap text-muted me-2"></i> **Modalidad:** En Línea</li>
                                </ul>
                                <a href="#" class="btn btn-outline-primary w-100 mt-2">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <div class="text-center mt-5">
                    <a href="#" class="btn btn-lg btn-secondary">Ver Calendario Completo</a>
                </div>
            </section>
            
        </div>
    </main>
    
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2025 CNDH | Centro Nacional de Derechos Humanos.</p>
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