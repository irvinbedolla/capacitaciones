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
        <script src="../../public/assets/js/color-modes.js"></script>
        <link href="../../public/assets/dist/css/bootstrap.min.css" rel="stylesheet" />
        <meta name="theme-color" content="#712cf9" />
        <link href="../../public/assets/carousel.css" rel="stylesheet" />
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
        </style>
    </head>
  <body>


<div class="container">
    <h1>Crear Nuevo Usuario</h1>
            <!--Se realiza la validación de campos para ver si dejó alguno vacío-->
            @if ($errors->any())
                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                    <strong>¡Revise los campos!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            <!--<span class="badge badge-danger">{{ $error }}</span>-->
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                       </button>
                </div>
            @endif
            <form class='needs-validation novalidate' id='form_roles' method='POST' action="{{route('store_public')}}">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="name">Nombre Completo</label>
                            <input type="text" class="form-control" name="name" required>
                            <div class="invalid-feedback">
                                El nombre es obligatorio.
                            </div>
                        </div>
                    </div>
                                    
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" required>
                            <div class="invalid-feedback">
                                El Email es obligatorio.
                            </div>
                        </div>
                    </div>
                                   
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" required>
                            <div class="invalid-feedback">
                                La contraseña es obligatoria.
                            </div>
                        </div>
                    </div>
                                    
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="confirm-password">Confirmar Password</label>
                            <input type="password" class="form-control" name="confirm-password" required>
                            <div class="invalid-feedback">
                                La contraseña es obligatoria.
                            </div>
                        </div>
                    </div>
                                    
                                    
                    <div class="col-xs-12 col-sm-12 col-md-6"><br>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
            </div>
        </form>   
</div>
