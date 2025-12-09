@extends('layouts.auth_app')

@section('title')
    Iniciar sesión
@endsection

@section('content')

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
        background: linear-gradient(115deg, #ffffff 50%, #003366 50.1%);
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
        background-color: #003366;
        color: white;
        text-align: center;
        padding: 20px;
        margin-top: 50px;
        font-size: 0.75rem;
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
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div><img src="public/assets/images/ccl-r.png" style="max-height: 60px;"></div>
                <!--div style="text-align: right;"><img src="public/assets/images/ccl-r.png" style="max-height: 55px;"></!--div-->
            </div>
        </div>
    </div>
</div>

<div class="container mt-2 mb-3">
    <small style="color: #007bff;">Página Principal (home)</small> <small class="text-muted"> ▶ Ingresar al sitio</small>
</div>

<div class="container">
    
    <div class="fila-dividida">
        
        <div class="columna-mitad" style="border-right: 1px solid #eee;">
            <h3>Iniciar sesión (ingresar)</h3>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="fila-formulario">
                    <label for="email" class="label-alineado">Correo Electrónico</label>
                    <input id="email" type="text" class="input-classic" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="fila-formulario">
                    <label for="password" class="label-alineado">Contraseña</label>
                    <input id="password" type="password" class="input-classic" name="password" required>
                </div>

                <div style="text-align: center; margin-top: 25px; margin-bottom: 15px;">
                    <button type="submit" class="btn-classic">
                        Iniciar sesión (ingresar)
                    </button>
                </div>

                <div style="text-align: center;">
                    <a href="#" style="font-size: 0.85rem; color: #007bff; text-decoration: none;">¿Olvidó su nombre_de_usuario o contraseña?</a>
                    <div style="font-size: 0.8rem; color: #666; margin-top: 8px;">
                        Las 'Cookies' deben estar habilitadas en su navegador
                    </div>
                </div>
            </form>
        </div>

        <div class="columna-mitad" style="text-align: center;">
            <h3>Registrarse como usuario</h3>
            <div style="padding: 0 40px; margin-top: 20px;">
                <p style="font-weight: bold; font-size: 0.9rem; color: #333;">
                    Para acceso completo a este sitio, usted necesita primeramente crear una cuenta.
                </p>
                <br>
                <a href="{{ route('users.create') }}" class="btn-classic">
                    Comience ahora creando una cuenta nueva
                </a>
            </div>
        </div>

    </div> 
</div>

<div class="container-fluid footer-bar">
    Derechos reservados © ® 2021 - 2026 | <span style="color:#D4AF37;">Centro de Conciliación Laboral del Estado de Michoacán</span> | 
    <br> Blvd. García de León NO. 1575, Col. Chapultepec Oriente, C.P.58260 Morelia, Michoacán de Ocampo. | 
</div>

@endsection