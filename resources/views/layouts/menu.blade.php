
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    @auth
        @role('Super Usuario')
            <a class="nav-link" href="{{ route('usuarios') }}">
                <i class="bi bi-people-fill"></i><span class="text-dark" onclick="usuarios()">Usuarios</span>
            </a>
            <a class="nav-link" href="{{ route('roles') }}">
                <i class="bi bi-person-lines-fill"></i><span class="text-dark" onclick="roles()">Roles</span>
            </a>
            <a class="nav-link" href="{{ route('capacitaciones') }}">
                <i class="bi bi-backpack4-fill"></i><span class="text-dark" onclick="capacitaciones()">Capacitaciones</span>
            </a>
            <a class="nav-link" href="{{ route('miscapacitaciones') }}">
                <i class="bi bi-backpack4-fill"></i><span class="text-dark" onclick="mis_capacitaciones()">Mis capacitaciones</span>
            </a>
            <a class="nav-link" href="{{ route('expedientes') }}">
                <i class="bi bi-graph-down"></i><span class="text-dark" onclick="expedientes()">Expediente</span>
            </a>
        @endrole
    @endauth
    @auth
        @role('Cumplimientos')
            <a class="nav-link" href="{{ route('poderes') }}">
                <i class="bi bi-bank"></i><span class="text-dark" onclick="poderes()">Cursos</span>
            </a>
            <a class="nav-link" href="{{ route('capacitaciones') }}">
                <i class="bi bi-backpack4-fill"></i><span class="text-dark" onclick="capacitaciones()">Capacitaciones</span>
            </a>
            <a class="nav-link" href="{{ route('miscapacitaciones') }}">
                <i class="bi bi-backpack4-fill"></i><span class="text-dark" onclick="mis_capacitaciones()">Mis capacitaciones</span>
            </a>
            <a class="nav-link" href="{{ route('expedientes') }}">
                <i class="bi bi-graph-down"></i><span class="text-dark" onclick="expedientes()">Expediente</span>
        @endrole
    @endauth
    @auth
        @role('Solicitante')
            <a class="nav-link" href="{{ route('mis_solicitudes') }}">
                <i class="bi bi-file-person"></i><span class="text-dark" onclick="consultar_estadistica()">Mis Solicitudes</span>
            </a>
            <a class="nav-link" href="{{ route('ratificacion') }}">
                <i class="bi bi-bank"></i><span class="text-dark" onclick="mis_citas()">Mis Ratificaciones</span>
            </a>
        @endrole
    @endauth
    
</li>


