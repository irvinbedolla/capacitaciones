
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    @auth
        @role('Super Usuario')
            <a class="nav-link" href="{{ route('usuarios') }}">
                <i class="bi bi-people-fill"></i><span class="text-dark" onclick="usuarios()">Usuarios</span>
            </a>

            <a class="nav-link" href="{{ route('generarCursos') }}">
                <i class="bi bi-people-fill"></i><span class="text-dark" onclick="usuarios()">Crear curso</span>
            </a>

            <a class="nav-link" href="{{ route('roles') }}">
                <i class="bi bi-person-lines-fill"></i><span class="text-dark" onclick="roles()">Roles</span>
            </a>
            <a class="nav-link" href="{{ route('usuarios') }}">
                <i class="bi bi-people-fill"></i><span class="text-dark" onclick="usuarios()">Perfil</span>
            </a>
            <a class="nav-link" href="{{ route('mis_capacitaciones') }}">
                <i class="bi bi-backpack4-fill"></i><span class="text-dark" onclick="mis_capacitaciones()">Área de Formación</span>
            </a>
            <a class="nav-link" href="{{ route('expedientes') }}">
                <i class="bi bi-graph-down"></i><span class="text-dark" onclick="expedientes()">Expediente</span>
            </a>
            <a class="nav-link" href="{{ route('ponentes') }}">
                <i class="bi bi-graph-down"></i><span class="text-dark" onclick="Ponentes()">Ponentes</span>
            </a>
        @endrole
    @endauth
    @auth
        @role('Capacitacion Usuario')
            <a class="nav-link" href="{{ route('miscapacitaciones') }}">
                <i class="bi bi-backpack4-fill"></i><span class="text-dark">Perfil</span>
            </a>
            <a class="nav-link" href="{{ route('miscapacitaciones') }}">
                <i class="bi bi-backpack4-fill"></i><span class="text-dark">Seminarios</span>
            </a>
            <a class="nav-link" href="# }}">
                <i class="bi bi-graph-down"></i><span class="text-dark">Cursos</span>
            </a>
            <a class="nav-link" href="# }}">
                <i class="bi bi-backpack4-fill"></i><span class="text-dark">Evaluaciones</span>
            </a>
            <a class="nav-link" href="# }}">
                <i class="bi bi-graph-down"></i><span class="text-dark">Expediente</span>
            </a>
            <a class="nav-link" href="# }}">
                <i class="bi bi-backpack4-fill"></i><span class="text-dark">Buzón</span>
            </a>
        @endrole
    @endauth
    @auth
        @role('Ponente')
            <a class="nav-link" href="">
                <i class="bi bi-graph-down"></i><span class="text-dark" onclick="ponente_usuario()">Mis datos</span>
            </a>
            <a class="nav-link" href="{{ route('ponentes') }}">
                <i class="bi bi-graph-down"></i><span class="text-dark" onclick="Ponentes()">Ponentes</span>
            </a>
        @endrole
    @endauth
    
</li>


