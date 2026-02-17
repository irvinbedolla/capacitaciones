<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capacitaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css"> 
</head>
        <style>
        .fila-dividida {
            display: flex;
            flex-direction: row;
            width: 100%;
            min-height: 450px; 
            align-items: center; 
        }

        .columna-mitad {
            width: 50%;
            padding: 10px;
            box-sizing: border-box;
        }

        .fila-formulario {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
        }


        .label-alineado {
            width: 160px;       
            text-align: right;  
            margin-right: 15px; 
            color: #333;
            font-weight: normal;
            font-size: 0.95rem;
        }

        .input-classic {
            width: 210px;     
            padding: 4px 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 0.9rem;
        }

        .header-diagonal {
            background: linear-gradient(115deg, #ffffff 50%, #4d6666 50.1%);
            padding: 15px 0;
            border-bottom: 5px solid #D4AF37;
        }

        h3 {
            font-family: sans-serif;
            font-weight: bold;
            font-size: 1.6rem;
            color: #333;
            margin-bottom: 35px;
            text-align: center;
        }

        .btn-classic {
            background-color: #e6e6e6;
            border: 1px solid #bfbfbf;
            color: #333;
            padding: 5px 20px;
            font-size: 0.9rem;
            cursor: pointer;
            border-radius: 3px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }
        .btn-classic:hover { background-color: #dcdcdc; }

        .footer-bar {
            background-color: #4d6666;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
            font-size: 0.75rem;
        }
        .center {
            flex-direction: row;
            width: 100%;
            min-height: 450px; 
            align-items: center;      
        }
        .columna-center {
            padding: 50px;
            box-sizing: border-box;
        }

        @media (max-width: 768px) {
            .fila-dividida { flex-direction: column; }
            .columna-mitad { width: 100%; min-height: auto; }
            .label-alineado { width: auto; text-align: left; margin-right: 0; }
            .fila-formulario { flex-direction: column; align-items: flex-start; padding-left: 20%; }
            .input-classic { width: 100%; }
        }
    </style>

    <div class="container-fluid p-0">
        <div class="header-diagonal">
            <div class="container">
                <div style="display: flex; align-items: center;">
                    <div><img src="public/assets/images/ccl-r.png" style="max-height: 60px;"></div>
                    <!--div style="text-align: right;"><img src="public/assets/images/ccl-r.png" style="max-height: 55px;"></!--div-->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        
        <div class = "center">
            <div class="columna-center">
                <h3>Crear nuevo usuario</h3>
<!--Se realiza la validación de campos para ver si dejó alguno vacío-->
                @if ($errors->any())
                    <div class="alert alert-dark alert-dismissible fade show" role="alert">
                        <strong>¡Revise los campos!</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                <<span class="badge badge-danger">{{ $error }}</span>>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form method="POST" action="{{ route('store_public') }}">
                    @csrf
                    
                    <div class="fila-formulario">
                        <label for="name" class ="label-alineado">Nombre Completo</label>
                            <input type="text" class="input-classic" name="name"  required>
                            <div class="invalid-feedback">
                                El nombre es obligatorio.
                            </div>
                    </div>

                    <div class="fila-formulario">
                        <label for="email" class ="label-alineado">Email</label>
                            <input type="email" class="input-classic" name="email" required>
                            <div class="invalid-feedback">
                                El Email es obligatorio.
                            </div>
                    </div>
                    <div class="fila-formulario">
                        <label for="password" class ="label-alineado">Password</label>
                            <input type="password" class="input-classic" name="password" required>
                            <div class="invalid-feedback">
                                La contraseña es obligatoria.
                            </div>
                    </div>
                    <div class="fila-formulario">
                        <label for="confirm-password" class ="label-alineado">Confirmar Password</label>
                            <input type="password" class="input-classic" name="confirm-password" required>
                            <div class="invalid-feedback">
                                La contraseña es obligatoria.
                            </div>
                    </div>

                    <div style="text-align: center; margin-top: 25px; margin-bottom: 15px;">
                        <button type="submit" class="btn-classic">
                            Guardar
                        </button>
                    </div>

                    
                </form>
            </div>
        </div>
    </div>
     <div class="container-fluid footer-bar">
        Derechos reservados © ® 2021 - 2026 | <span style="color:#D4AF37;">Centro de Conciliación Laboral del Estado de Michoacán</span> | 
        <br> Blvd. García de León NO. 1575, Col. Chapultepec Oriente, C.P.58260 Morelia, Michoacán de Ocampo. | 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
  <body>


<!--div class="container">
    <h1>Crear Nuevo Usuario</h1>
            <Se realiza la validación de campos para ver si dejó alguno vacío>
            @if ($errors->any())
                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                    <strong>¡Revise los campos!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            <<span class="badge badge-danger">{{ $error }}</span>>
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
</div-->

