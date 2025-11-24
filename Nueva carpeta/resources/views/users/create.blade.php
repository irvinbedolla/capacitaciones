@extends('layouts.app') 
{{-- Asume que tienes un layout principal llamado 'layouts.app' --}}

@section('content')
<div class="container">
    <h1>Crear Nuevo Usuario</h1>

    {{-- 
        El formulario apunta a la ruta 'users.store', que está definida como POST en routes/web.php
        y es manejada por el método 'store' de UserController.
    --}}
    <form method="POST" action="{{ route('users.store') }}">
        
        {{-- ¡DIRECTIVA DE SEGURIDAD CRUCIAL! --}}
        {{-- Es OBLIGATORIO incluir el token CSRF para proteger tu formulario contra Cross-Site Request Forgery --}}
        @csrf

        {{-- Campo Nombre --}}
        <div class="form-group mb-3">
            <label for="name">Nombre</label>
            <input type="text" 
                   class="form-control @error('name') is-invalid @enderror" 
                   id="name" 
                   name="name" 
                   value="{{ old('name') }}" 
                   required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Campo Correo Electrónico --}}
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" 
                   class="form-control @error('email') is-invalid @enderror" 
                   id="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Campo Contraseña --}}
        <div class="form-group mb-3">
            <label for="password">Contraseña</label>
            <input type="password" 
                   class="form-control @error('password') is-invalid @enderror" 
                   id="password" 
                   name="password" 
                   required>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        {{-- Campo Confirmación de Contraseña --}}
        {{-- Laravel necesita este campo para validar si la contraseña coincide (regla 'confirmed') --}}
        <div class="form-group mb-4">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password" 
                   class="form-control" 
                   id="password_confirmation" 
                   name="password_confirmation" 
                   required>
        </div>

        <button type="submit" class="btn btn-success">Guardar Usuario</button>
        <a href="{{ url('/dashboard') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection