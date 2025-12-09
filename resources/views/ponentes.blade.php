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
                        <li class="nav-item"><a class="nav-link" href="{{ route('publico') }}">Inicio</a></li>
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
                <h2 class="mb-4 border-bottom pb-2">Ponentes</h2>
                
            <div class="container marketing">
        <div class="row">
          <h3><center>Ponentes</center></h3>
          <div class="col-lg-4">
            <svg
              aria-label="Placeholder"
              class="bd-placeholder-img rounded-circle"
              height="140"
              preserveAspectRatio="xMidYMid slice"
              role="img"
              width="140"
              xmlns="http://www.w3.org/2000/svg">
            <defs>
              <pattern id="imagenFondo" patternUnits="userSpaceOnUse" width="100%" height="100%">
                  <image href="public/assets/images/ponentes/federico.jpg" x="0" y="0" width="100%" height="100%" />
              </pattern>
            </defs>
              <title>Placeholder</title>
              <rect
                width="100%"
                height="100%"
                fill="url(#imagenFondo)"></rect>
            </svg>
            <h2 class="fw-normal">Dr. Federico Anaya Ojeda</h2>
            <button type="button" class="btn btn-outline-primary w-100 mt-2" data-bs-toggle="modal" data-bs-target="#Federico">
                Ver Semblanza
            </button>
            <div class="modal fade" id="Federico" tabindex="-1" aria-labelledby="semblanzaModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                      
                      <div class="modal-header">
                          <h5 class="modal-title" id="semblanzaModalLabel">Semblanza Profesional</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      
                      <div class="modal-body">
                          <h2 class="fw-normal">Dr. Federico Anaya Ojeda</h2>
                          
                          <p style="text-align: justify;">
                              Semblanza: Abogado Laboralista, Administrador de Empresas, Doctor y Doctorante, es Presidente de la Firma Legal Anaya Valdepeña —fundada en 1932— y 
                              del Instituto Latinoamericano de Derecho del Trabajo y de la Seguridad Social (ILTRAS). Se desempeña como Profesor de Posgrado en la Escuela Libre de Derecho 
                              y en el Instituto de Posgrado en Derecho. Ha sido Asesor de empresas, sindicatos y cámaras industriales; actualmente funge como Abogado General de la Cámara Nacional 
                              de la Industria del Vestido (CANAIVE) y como Vicepresidente de la Cámara Nacional de la Industria Editorial Mexicana (CANIEM). Es Conferencista Internacional y autor de 
                              múltiples obras jurídicas. Asimismo, es Director General de EVA Editorial y de la Revista Laboral.
                          </p>
                          
                      </div>
                      
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      </div>
                      
                  </div>
              </div>
            </div>
          </div>
          <!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <svg
              aria-label="Placeholder"
              class="bd-placeholder-img rounded-circle"
              height="140"
              preserveAspectRatio="xMidYMid slice"
              role="img"
              width="140"
              xmlns="http://www.w3.org/2000/svg"
            >
            <defs>
              <pattern id="Yadira" patternUnits="userSpaceOnUse" width="100%" height="100%">
                  <image href="public/assets/images/ponentes/luis.jpg" x="0" y="0" width="100%" height="100%" />
              </pattern>
            </defs>
              <title>Placeholder</title>
              <rect
                width="100%"
                height="100%"
                fill="url(#Yadira)"></rect>
            </svg>
            <h2 class="fw-normal">Dr. Luis Manuel Díaz Mirón Álvarez</h2>
            <button type="button" class="btn btn-outline-primary w-100 mt-2" data-bs-toggle="modal" data-bs-target="#Federico">
                Ver Semblanza
            </button>
            <div class="modal fade" id="Federico" tabindex="-1" aria-labelledby="Luis" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                      
                      <div class="modal-header">
                          <h5 class="modal-title" id="Luis">Semblanza Profesional</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      
                      <div class="modal-body">
                          <h2 class="fw-normal">Dr. Luis Manuel Díaz Mirón Álvarez</h2>
                          
                          <p style="text-align: justify;">
                              Semblanza: Cuenta con Maestría en Derecho del Trabajo por la Escuela Libre de Derecho. Es Abogado por la misma institución, 
                              con Mención Honorífica, y Doctor Honoris Causa por el Claustro Nacional de Doctores Honoris Causa. Ha sido Profesor Titular de 
                              Derecho del Trabajo en la Escuela Libre de Derecho desde 1990 y Profesor de la Especialidad en Derecho Laboral en la Universidad 
                              Panamericana. Se desempeñó como Rector de la Escuela Libre de Derecho de 2014 a 2018. Actualmente es Socio Director del Bufete Díaz Mirón y Asociados, S.C., 
                              firma especializada en consultoría y defensa laboral. Ha sido reconocido por Chambers & Partners como experto en Derecho Laboral y es autor y 
                              coautor de diversas obras publicadas por Tirant Lo Blanch y Editorial Porrúa.
                          </p>
                          
                      </div>
                      
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      </div>
                      
                  </div>
              </div>
            </div>
          </div>
          <!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <svg
              aria-label="Placeholder"
              class="bd-placeholder-img rounded-circle"
              height="140"
              preserveAspectRatio="xMidYMid slice"
              role="img"
              width="140"
              xmlns="http://www.w3.org/2000/svg"
            >
            <defs>
              <pattern id="Sandra" patternUnits="userSpaceOnUse" width="100%" height="100%">
                  <image href="public/assets/images/ponentes/sandra.jpg" x="0" y="0" width="100%" height="100%" />
              </pattern>
            </defs>
              <title>Placeholder</title>
              <rect
                width="100%"
                height="100%"
                fill="url(#Sandra)"></rect>
            </svg>
            <h2 class="fw-normal">Mtra. Sandra Carrizosa Guzmán</h2>
            <button type="button" class="btn btn-outline-primary w-100 mt-2" data-bs-toggle="modal" data-bs-target="#SandraModal">
                Ver Semblanza
            </button>
            <div class="modal fade" id="SandraModal" tabindex="-1" aria-labelledby="Luis" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                      
                      <div class="modal-header">
                          <h5 class="modal-title" id="Luis">Semblanza Profesional</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      
                      <div class="modal-body">
                          <h2 class="fw-normal">Mtra. Sandra Carrizosa Guzmán</h2>
                          
                          <p style="text-align: justify;">
                              Semblanza: Es Abogada por la UNAM. Cuenta con una Maestría en Derecho y una Especialidad en Derecho Constitucional por la misma universidad. 
                              También posee una Maestría en Políticas Públicas y Administración por la London School of Economics and Political Science. Tiene experiencia en el análisis 
                              .jurídico, la revisión legislativa y el desarrollo de políticas sociales, con énfasis en la defensa de los derechos humanos y la diplomacia internacional. 
                              Su trayectoria incluye la gestión de programas de cooperación internacional multianual de gran escala, el fortalecimiento de capacidades a nivel regional y la 
                              promoción del aprendizaje entre pares en temas clave de justicia social. Actualmente colabora en la Organización Internacional del Trabajo, donde está a cargo de la
                              implementación del proyecto FARO, enfocado en la prevención de conflictos y el acceso a la justicia con perspectiva de género.
                          </p>
                          
                      </div>
                      
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      </div>
                      
                  </div>
              </div>
            </div>
          </div>
        </div><br><br>
        <div class="row">
          <!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <svg
              aria-label="Placeholder"
              class="bd-placeholder-img rounded-circle"
              height="140"
              preserveAspectRatio="xMidYMid slice"
              role="img"
              width="140"
              xmlns="http://www.w3.org/2000/svg"
            >
            <defs>
              <pattern id="Gianni" patternUnits="userSpaceOnUse" width="100%" height="100%">
                  <image href="public/assets/images/ponentes/gianni.jpg" x="0" y="0" width="100%" height="100%" />
              </pattern>
            </defs>
              <title>Placeholder</title>
              <rect
                width="100%"
                height="100%"
                fill="url(#Gianni)"></rect>
            </svg>
            <h2 class="fw-normal">Dra. Gianni Rueda de León Íñigon</h2>
            <button type="button" class="btn btn-outline-primary w-100 mt-2" data-bs-toggle="modal" data-bs-target="#GianniModal">
                Ver Semblanza
            </button>
            <div class="modal fade" id="GianniModal" tabindex="-1" aria-labelledby="semblanzaModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                      
                      <div class="modal-header">
                          <h5 class="modal-title" id="semblanzaModalLabel">Semblanza Profesional</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      
                      <div class="modal-body">
                          <h2 class="fw-normal">Dra. Gianni Rueda de León Íñigon</h2>
                          
                          <p style="text-align: justify;">
                              Semblanza: Doctorante en Política Criminal y Maestra en Derechos Humanos y Prevención del Delito, está certificada por la Organización 
                              Internacional del Trabajo como conciliadora en conflictos laborales y por el Servicio Federal de Mediación y Conciliación de los Estados 
                              Unidos en técnicas de conciliación. Durante los últimos 16 años ha ocupado diversos cargos en instituciones encargadas de la procuración de 
                              justicia en México. Fungió como Subprocuradora General de Asuntos Foráneos y como Subprocuradora General de Asesoría y Apoyo Técnico en la Procuraduría 
                              Federal de la Defensa del Trabajo. Actualmente se desempeña como Coordinadora General de Conciliación Individual del Centro Federal de Conciliación y 
                              Registro Laboral, donde tiene a su cargo la organización y ejecución del servicio de conciliación prejudicial a nivel nacional.
                          </p>
                          
                      </div>
                      
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      </div>
                      
                  </div>
              </div>
            </div>
          </div>
          <!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <svg
              aria-label="Placeholder"
              class="bd-placeholder-img rounded-circle"
              height="140"
              preserveAspectRatio="xMidYMid slice"
              role="img"
              width="140"
              xmlns="http://www.w3.org/2000/svg"
            >
            <defs>
              <pattern id="Alejandro" patternUnits="userSpaceOnUse" width="100%" height="100%">
                  <image href="public/assets/images/ponentes/alejandro.jpg" x="0" y="0" width="100%" height="100%" />
              </pattern>
            </defs>
              <title>Placeholder</title>
              <rect
                width="100%"
                height="100%"
                fill="url(#Alejandro)"></rect>
            </svg>
            <h2 class="fw-normal">Lic. Alejandro Avilés Gómez</h2>
            <button type="button" class="btn btn-outline-primary w-100 mt-2" data-bs-toggle="modal" data-bs-target="#AlejandroAviles">
                Ver Semblanza
            </button>
            <div class="modal fade" id="AlejandroAviles" tabindex="-1" aria-labelledby="semblanzaModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                      
                      <div class="modal-header">
                          <h5 class="modal-title" id="semblanzaModalLabel">Semblanza Profesional</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      
                      <div class="modal-body">
                          <h2 class="fw-normal">Lic. Alejandro Avilés Gómez</h2>
                          
                          <p style="text-align: justify;">
                              Semblanza: Es Licenciado en Derecho por la UNAM, con Especialidad en Derecho Laboral por la misma institución y 
                              en Constitución Social y Derechos Humanos Laborales por la Universidad de Castilla-La Mancha, en España. Actualmente es 
                              Maestrante en Administración Pública por la Universidad Anáhuac Norte. Ha sido profesor en la Facultad de Derecho de la UNAM y se 
                              desempeña como Apoderado Legal del Sindicato de Trabajadores de la UNAM. Forma parte del equipo jurídico de la Confederación Sindical de las 
                              Américas y ha representado a México en diversas Conferencias Internacionales del Trabajo. Es miembro de la Academia Mexicana de 
                              Derecho del Trabajo y Presidente del Colegio de Abogados Laboralistas de la Ciudad de México.
                          </p>
                          
                      </div>
                      
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      </div>
                      
                  </div>
              </div>
            </div>
          </div>
          <!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <svg
              aria-label="Placeholder"
              class="bd-placeholder-img rounded-circle"
              height="140"
              preserveAspectRatio="xMidYMid slice"
              role="img"
              width="140"
              xmlns="http://www.w3.org/2000/svg"
            >
            <defs>
              <pattern id="Maria" patternUnits="userSpaceOnUse" width="100%" height="100%">
                  <image href="public/assets/images/ponentes/maria.jpg" x="0" y="0" width="100%" height="100%" />
              </pattern>
            </defs>
              <title>Placeholder</title>
              <rect
                width="100%"
                height="100%"
                fill="url(#Maria)"></rect>
            </svg>
            <h2 class="fw-normal">Dra. María de los Ángeles López Martínez</h2>
            <button type="button" class="btn btn-outline-primary w-100 mt-2" data-bs-toggle="modal" data-bs-target="#MariaModal">
                Ver Semblanza
            </button>
            <div class="modal fade" id="MariaModal" tabindex="-1" aria-labelledby="Luis" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                      
                      <div class="modal-header">
                          <h5 class="modal-title" id="Luis">Semblanza Profesional</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      
                      <div class="modal-body">
                          <h2 class="fw-normal">Dra. María de los Ángeles López Martínez</h2>
                          
                          <p style="text-align: justify;">
                              Semblanza: Licenciada en Derecho por la Facultad de Jurisprudencia de la Universidad Autónoma de Coahuila, 
                              obtuvo el Grado de Maestría en Derecho Laboral por la Facultad de Derecho y Ciencias Sociales de la UANL, así como el Certificado de 
                              Doctorado en Administración y Alta Dirección por la Facultad de Contaduría y Administración, Campus Torreón, de la misma universidad. 
                              Es Presidenta de la Academia Mexicana del Derecho del Trabajo y de la Previsión Social, siendo la primera mujer en desempeñar dicho cargo. 
                              Cuenta con un Doctorado Honoris Causa por el Centro de Estudios Avanzados de las Américas. Es miembro y delegada por Coahuila de la Asociación 
                              Iberoamericana de Derecho del Trabajo y de la Seguridad Social; Académica Número 15 de la Academia Mexicana de Derecho Procesal del Trabajo; socia 
                              fundadora y presidenta de la Asociación de Licenciadas en Derecho de Coahuila A.C.; expresidenta de la Asociación de Ejecutivos de Relaciones 
                              Industriales Coahuila Sureste A.C.; y socia fundadora tanto de la Asociación Mexicana de Consejeras Electorales Estatales A.C. como del Colegio de 
                              Abogados Laboralistas de Coahuila. Es autora de artículos jurídicos y coautora en obras de derecho burocrático y electoral.
                          </p>
                          
                      </div>
                      
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      </div>
                      
                  </div>
              </div>
            </div>
          </div>
        </div><br><br>
        <div class="row">
          <!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <svg
              aria-label="Placeholder"
              class="bd-placeholder-img rounded-circle"
              height="140"
              preserveAspectRatio="xMidYMid slice"
              role="img"
              width="140"
              xmlns="http://www.w3.org/2000/svg"
            >
            <defs>
              <pattern id="Carlos" patternUnits="userSpaceOnUse" width="100%" height="100%">
                  <image href="public/assets/images/ponentes/carlos.jpg" x="0" y="0" width="100%" height="100%" />
              </pattern>
            </defs>
              <title>Placeholder</title>
              <rect
                width="100%"
                height="100%"
                fill="url(#Carlos)"></rect>
            </svg>
            <h2 class="fw-normal">Dr. Carlos Reynoso Castillo</h2>
            <button type="button" class="btn btn-outline-primary w-100 mt-2" data-bs-toggle="modal" data-bs-target="#CarlosModal">
                Ver Semblanza
            </button>
            <div class="modal fade" id="CarlosModal" tabindex="-1" aria-labelledby="Luis" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                      
                      <div class="modal-header">
                          <h5 class="modal-title" id="Luis">Semblanza Profesional</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      
                      <div class="modal-body">
                          <h2 class="fw-normal">Dr. Carlos Reynoso Castillo</h2>
                          
                          <p style="text-align: justify;">
                            Semblanza: Es Licenciado en Derecho por la Universidad Autónoma Metropolitana y cuenta con un Diplomado en Derecho 
                            Comparado por la Universidad París II, en Francia, así como con un Diplomado en Derecho Comparado del Trabajo por la 
                            Universidad de Szeged, en Hungría. Realizó un curso en Políticas de Empleo en Ginebra, Suiza, además de diversos cursos en 
                            materia laboral en Turín y Bolonia, en Italia; en Toledo, España; y nuevamente en Ginebra. Es Doctor en Derecho por la Universidad 
                            Sorbona, París I, Francia. Ha ocupado diversos cargos públicos, entre ellos Director de Legislación y Consulta en la Secretaría de 
                            Comercio y Fomento Industrial; Consultor Externo de la Organización Internacional del Trabajo en México y en Suiza; Director General de 
                            Asuntos Jurídicos en la Universidad Nacional Autónoma de México; Director General de Profesiones en la SEP; y Abogado General de la Universidad 
                            Autónoma Metropolitana. Como asesor jurídico ha colaborado con diversas instituciones y empresas, incluyendo la UNAM, la UAM, el Instituto Politécnico 
                            Nacional, el Colegio Nacional de Educación Profesional Técnica, el Centro de Investigaciones y Estudios Superiores en Antropología Social, la 
                            Procuraduría Federal del Consumidor, el Centro de Investigación y de Estudios Avanzados del IPN, la Universidad de Ciencias y Artes de Chiapas, el 
                            Instituto Tecnológico de Sonora, Aspel y Grupo ONCE, entre otras. Es autor de más de cien artículos publicados en revistas especializadas en México 
                            y en el extranjero, así como de numerosos libros. Actualmente es Profesor de Derecho del Trabajo en la Universidad Autónoma Metropolitana y se 
                            desempeña como asesor especializado en materia laboral.
                          </p>
                          
                      </div>
                      
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      </div>
                      
                  </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <hr class="featurette-divider" />
        <!-- /END THE FEATURETTES -->
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