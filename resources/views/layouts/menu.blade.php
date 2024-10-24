<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Inicio</span>
    </a>
    @can('ver-rol')
        <a class="nav-link" href="/usuarios">
            <i class=" fas fa-building"></i><span>Usuarios</span>
        </a>
    @endcan
    @can('ver-rol')
        <a class="nav-link" href="/roles">
            <i class=" fas fa-building"></i><span>Roles</span>
        </a>
    @endcan
    <a class="nav-link" href="/profesores">
        <i class="fas fa-user-tie"></i><span>Profesores</span>
    </a>
    <a class="nav-link" href="/especialidades">
        <i class="fas fa-book-open"></i><span>Especialidades</span>
    </a>
    <a class="nav-link" href="/aulas">
        <i class="fas fa-school"></i><span>Aulas</span>
    </a>
    <a class="nav-link" href="/secciones">
        <i class="fas fa-school"></i><span>Secciones</span>
    </a>
    <a class="nav-link" href="/materias">
        <i class="fas fa-swatchbook"></i><span>Materias</span>
    </a>
    <div class="dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" id="horariosDropdown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-swatchbook"></i><span>Horarios</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="horariosDropdown">
            <a class="dropdown-item" href="/horasmateria">Horarios</a>
            <a class="dropdown-item" href="/horarios">Horarios Profesores</a>
            <a class="dropdown-item" href="/horarioss">Horarios Secciones</a>
        </div>
    </div>
</li>
