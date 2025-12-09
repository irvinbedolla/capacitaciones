<!doctype html>
<html lang="es" data-bs-theme="auto">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="" />
        <meta
        name="author"
        content="Mark Otto, Jacob Thornton, and Bootstrap contributors"
        />
        <meta name="generator" content="Astro v5.13.2" />
        <title>Sistema de Capacitaciones de CONACENTROS</title>
        <link
        rel="canonical"
        href="https://getbootstrap.com/docs/5.3/examples/carousel/"
        />
        <script src="public/assets/js/color-modes.js"></script>
        <link href="public/assets/dist/css/bootstrap.min.css" rel="stylesheet" />
        <meta name="theme-color" content="#712cf9" />
        <link href="public/assets/carousel.css" rel="stylesheet" />
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }
            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                font-size: 3.5rem;
                }
            }
            .b-example-divider {
                width: 100%;
                height: 3rem;
                background-color: #0000001a;
                border: solid rgba(0, 0, 0, 0.15);
                border-width: 1px 0;
                box-shadow:
                inset 0 0.5em 1.5em #0000001a,
                inset 0 0.125em 0.5em #00000026;
            }
            .b-example-vr {
                flex-shrink: 0;
                width: 1.5rem;
                height: 100vh;
            }
            .bi {
                vertical-align: -0.125em;
                fill: currentColor;
            }
            .nav-scroller {
                position: relative;
                z-index: 2;
                height: 2.75rem;
                overflow-y: hidden;
            }
            .nav-scroller .nav {
                display: flex;
                flex-wrap: nowrap;
                padding-bottom: 1rem;
                margin-top: -1px;
                overflow-x: auto;
                text-align: center;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }
            .btn-bd-primary {
                --bd-violet-bg: #712cf9;
                --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
                --bs-btn-font-weight: 600;
                --bs-btn-color: var(--bs-white);
                --bs-btn-bg: var(--bd-violet-bg);
                --bs-btn-border-color: var(--bd-violet-bg);
                --bs-btn-hover-color: var(--bs-white);
                --bs-btn-hover-bg: #6528e0;
                --bs-btn-hover-border-color: #6528e0;
                --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
                --bs-btn-active-color: var(--bs-btn-hover-color);
                --bs-btn-active-bg: #5a23c8;
                --bs-btn-active-border-color: #5a23c8;
            }
            .bd-mode-toggle {
                z-index: 1500;
            }
            .bd-mode-toggle .bi {
                width: 1em;
                height: 1em;
            }
            .bd-mode-toggle .dropdown-menu .active .bi {
                display: block !important;
            }
            .texto-justificado {
                text-align: justify;
            }
        </style>
    </head>
  <body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path
            d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"
            ></path>
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path
            d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"
            ></path>
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path
            d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"
            ></path>
            <path
            d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"
            ></path>
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path
            d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"
            ></path>
        </symbol>
    </svg>
    <div
        class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button
            class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
            id="bd-theme"
            type="button"
            aria-expanded="false"
            data-bs-toggle="dropdown"
            aria-label="Toggle theme (auto)">
            <svg class="bi my-1 theme-icon-active" aria-hidden="true">
            <use href="#circle-half"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
            <button
                    type="button"
                    class="dropdown-item d-flex align-items-center"
                    data-bs-theme-value="light"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50" aria-hidden="true">
                    <use href="#sun-fill"></use>
                    </svg>
                    Light
                    <svg class="bi ms-auto d-none" aria-hidden="true">
                    <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
            <button
                type="button"
                class="dropdown-item d-flex align-items-center"
                data-bs-theme-value="dark"
                aria-pressed="false"
            >
                <svg class="bi me-2 opacity-50" aria-hidden="true">
                <use href="#moon-stars-fill"></use>
                </svg>
                Dark
                <svg class="bi ms-auto d-none" aria-hidden="true">
                <use href="#check2"></use>
                </svg>
            </button>
            </li>
            <li>
            <button
                type="button"
                class="dropdown-item d-flex align-items-center active"
                data-bs-theme-value="auto"
                aria-pressed="true"
            >
                <svg class="bi me-2 opacity-50" aria-hidden="true">
                <use href="#circle-half"></use>
                </svg>
                Auto
                <svg class="bi ms-auto d-none" aria-hidden="true">
                <use href="#check2"></use>
                </svg>
            </button>
            </li>
        </ul>
    </div>
    <header data-bs-theme="dark">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Crear Cuenta</a>
                </form>
            </div>
            </div>
        </nav>
    </header>
    <main>
      <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button
            type="button"
            data-bs-target="#myCarousel"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#myCarousel"
            data-bs-slide-to="1"
            aria-label="Slide 2"
          ></button>
          <button
            type="button"
            data-bs-target="#myCarousel"
            data-bs-slide-to="2"
            aria-label="Slide 3"
          ></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <svg
              aria-hidden="true"
              class="bd-placeholder-img"
              height="100%"
              preserveAspectRatio="xMidYMid slice"
              width="100%"
              xmlns="http://www.w3.org/2000/svg"
            >
              <rect
                width="100%"
                height="100%"
                fill="var(--bs-secondary-color)"
              ></rect>
            </svg>
            <div class="container">
              <div class="carousel-caption text-start">
                <h1>CONACENTROS.</h1>
                <img src="public/assets/images/ccl-r.png" alt="Logo" ><br><br>
                <p>
                  <a href="{{ route('login') }}" class="btn btn-lg btn-primary">Iniciar Seccion</a>
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <svg
              aria-hidden="true"
              class="bd-placeholder-img"
              height="100%"
              preserveAspectRatio="xMidYMid slice"
              width="100%"
              xmlns="http://www.w3.org/2000/svg"
            >
              <rect
                width="100%"
                height="100%"
                fill="var(--bs-secondary-color)"
              ></rect>
            </svg>
            <div class="container">
              <div class="carousel-caption">
                <h1>Cursos y Capacitaciones.</h1>
                <p>
                  Conoce nuestras capacitaciones si alguna te interesa puedes iniciar succión e inscribirte al curso que deseas..
                </p>
                <p><a class="btn btn-lg btn-primary" href="#">Consultar</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <svg
              aria-hidden="true"
              class="bd-placeholder-img"
              height="100%"
              preserveAspectRatio="xMidYMid slice"
              width="100%"
              xmlns="http://www.w3.org/2000/svg"
            >
              <rect
                width="100%"
                height="100%"
                fill="var(--bs-secondary-color)"
              ></rect>
            </svg>
            <div class="container">
              <div class="carousel-caption text-end">
                <h1>One more for good measure.</h1>
                <p>
                  Some representative placeholder content for the third slide of
                  this carousel.
                </p>
                <p>
                  <a class="btn btn-lg btn-primary" href="#">Browse gallery</a>
                </p>
              </div>
            </div>
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#myCarousel"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#myCarousel"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <!-- Marketing messaging and featurettes
  ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->
      <div class="container marketing">
        <!-- Three columns of text below the carousel -->
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
            <p class="texto-justificado">Semblanza: Abogado Laboralista, Administrador de Empresas, Doctor y Doctorante, es Presidente de la Firma Legal Anaya Valdepeña —fundada en 1932— y 
              del Instituto Latinoamericano de Derecho del Trabajo y de la Seguridad Social (ILTRAS). Se desempeña como Profesor de Posgrado en la Escuela Libre de Derecho 
              y en el Instituto de Posgrado en Derecho. Ha sido Asesor de empresas, sindicatos y cámaras industriales; actualmente funge como Abogado General de la Cámara Nacional 
              de la Industria del Vestido (CANAIVE) y como Vicepresidente de la Cámara Nacional de la Industria Editorial Mexicana (CANIEM). Es Conferencista Internacional y autor de 
              múltiples obras jurídicas. Asimismo, es Director General de EVA Editorial y de la Revista Laboral.
            </p>
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
            <p class="texto-justificado">Semblanza: Cuenta con Maestría en Derecho del Trabajo por la Escuela Libre de Derecho. Es Abogado por la misma institución, 
              con Mención Honorífica, y Doctor Honoris Causa por el Claustro Nacional de Doctores Honoris Causa. Ha sido Profesor Titular de 
              Derecho del Trabajo en la Escuela Libre de Derecho desde 1990 y Profesor de la Especialidad en Derecho Laboral en la Universidad 
              Panamericana. Se desempeñó como Rector de la Escuela Libre de Derecho de 2014 a 2018. Actualmente es Socio Director del Bufete Díaz Mirón y Asociados, S.C., 
              firma especializada en consultoría y defensa laboral. Ha sido reconocido por Chambers & Partners como experto en Derecho Laboral y es autor y 
              coautor de diversas obras publicadas por Tirant Lo Blanch y Editorial Porrúa.
            </p>
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
            <p class="texto-justificado">
              Semblanza: Es Abogada por la UNAM. Cuenta con una Maestría en Derecho y una Especialidad en Derecho Constitucional por la misma universidad. 
              También posee una Maestría en Políticas Públicas y Administración por la London School of Economics and Political Science. Tiene experiencia en el análisis 
              .jurídico, la revisión legislativa y el desarrollo de políticas sociales, con énfasis en la defensa de los derechos humanos y la diplomacia internacional. 
              Su trayectoria incluye la gestión de programas de cooperación internacional multianual de gran escala, el fortalecimiento de capacidades a nivel regional y la 
              promoción del aprendizaje entre pares en temas clave de justicia social. Actualmente colabora en la Organización Internacional del Trabajo, donde está a cargo de la
               implementación del proyecto FARO, enfocado en la prevención de conflictos y el acceso a la justicia con perspectiva de género.
            </p>
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
            <p class="texto-justificado">
             Semblanza: Doctorante en Política Criminal y Maestra en Derechos Humanos y Prevención del Delito, está certificada por la Organización 
             Internacional del Trabajo como conciliadora en conflictos laborales y por el Servicio Federal de Mediación y Conciliación de los Estados 
             Unidos en técnicas de conciliación. Durante los últimos 16 años ha ocupado diversos cargos en instituciones encargadas de la procuración de 
             justicia en México. Fungió como Subprocuradora General de Asuntos Foráneos y como Subprocuradora General de Asesoría y Apoyo Técnico en la Procuraduría 
             Federal de la Defensa del Trabajo. Actualmente se desempeña como Coordinadora General de Conciliación Individual del Centro Federal de Conciliación y 
             Registro Laboral, donde tiene a su cargo la organización y ejecución del servicio de conciliación prejudicial a nivel nacional.
            </p>
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
            <p class="texto-justificado">
             Semblanza: Es Licenciado en Derecho por la UNAM, con Especialidad en Derecho Laboral por la misma institución y 
             en Constitución Social y Derechos Humanos Laborales por la Universidad de Castilla-La Mancha, en España. Actualmente es 
             Maestrante en Administración Pública por la Universidad Anáhuac Norte. Ha sido profesor en la Facultad de Derecho de la UNAM y se 
             desempeña como Apoderado Legal del Sindicato de Trabajadores de la UNAM. Forma parte del equipo jurídico de la Confederación Sindical de las 
             Américas y ha representado a México en diversas Conferencias Internacionales del Trabajo. Es miembro de la Academia Mexicana de 
             Derecho del Trabajo y Presidente del Colegio de Abogados Laboralistas de la Ciudad de México.
            </p>
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
            <p class="texto-justificado">
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
            <h2 class="fw-normal">Dr.  Carlos Reynoso Castillo</h2>
            <p class="texto-justificado">          
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
        </div>
        <!-- /.row -->
        <!-- START THE FEATURETTES -->
        <hr class="featurette-divider" />
        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading fw-normal lh-1">
              Seminario 1.<br>
              <span class="text-body-secondary">FUNDAMENTOS DE LA CONCILIACION Y LA JUSTICIAL LABORAL.</span>
            </h2>
            <p class="lead">
              Objetivo: Proporcionar a 
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
              conflictos. 
            </p>
          </div>
          <div class="col-md-5">
            <svg
              aria-label="Placeholder: 500x500"
              class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
              height="500"
              preserveAspectRatio="xMidYMid slice"
              role="img"
              width="500"
              xmlns="http://www.w3.org/2000/svg"
            >
              <image 
                href="public/assets/images/index/Fundamentos1.jpeg" 
                x="0" 
                y="0" 
                width="100%" 
                height="100%"
                preserveAspectRatio="xMidYMid slice"
              />
            </svg>
          </div>
        </div>
        <hr class="featurette-divider" />
        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading fw-normal lh-1">
              SEMINARIO 2: 
              COMPETENCIAS 
              TÉCNICAS Y 
              HABILIDADES PARA 
              LA CONCILIACIÓN.   
            </h2>
            <p class="lead">
              Objetivo: Desarrollar en 
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
              diferenciada.
            </p>
          </div>
          <div class="col-md-5 order-md-1">
            <svg
              aria-label="Placeholder: 500x500"
              class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
              height="500"
              preserveAspectRatio="xMidYMid slice"
              role="img"
              width="500"
              xmlns="http://www.w3.org/2000/svg"
            >
              <image 
                href="public/assets/images/index/seminario2.jpg" 
                x="0" 
                y="0" 
                width="100%" 
                height="100%"
                preserveAspectRatio="xMidYMid slice"
              />
            </svg>
          </div>
        </div>
        <hr class="featurette-divider" />
        <!-- /END THE FEATURETTES -->
      </div>
      <!-- /.container -->
      <!-- FOOTER -->
      <footer class="container">
        <p class="float-end"><a href="#">Back to top</a></p>
        <p>
          &copy; 2017–2025 Company, Inc. &middot;
          <a href="#">Privacy</a> &middot; <a href="#">Terms</a>
        </p>
      </footer>
    </main>
    <script
      src="public/assets/dist/js/bootstrap.bundle.min.js"
      class="astro-vvvwv3sm"
    ></script>
  </body>
</html>
