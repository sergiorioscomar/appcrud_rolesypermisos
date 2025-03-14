<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Inicio</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('posts.index') }}" class="nav-link {{ Request::is('posts') ? 'active' : '' }}">
        <i class="nav-icon fas fa-clipboard"></i>
        <p>Ver Notas</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('posts2.index') }}" class="nav-link {{ Request::is('posts2') ? 'active' : '' }}">
        <i class="nav-icon fas fa-clipboard"></i>
        <p>Ver Canchas</p>
    </a>
</li>
<li class="nav-item">
    <a href="/calificar?userid={{Auth::user()->id}}" class="nav-link {{ Request::is('calificar') ? 'active' : '' }}">
        <i class="nav-icon fas fa-star"></i>
        <p>Calificar</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('contact') }}" class="nav-link">
        <i class="nav-icon fas fa-envelope"></i>
        <p>Dejar Un Mensaje</p>
    </a>
</li>
<li class="nav-item">
    <a href="/user/appointments" class="nav-link">
        <i class="nav-icon fas fa-clock"></i>
        <p>Reservar turno</p>
    </a>
</li>
@if(Auth::user()->isadmin || Auth::user()->role == 'admin')
<li class="nav-item">
    <a href="/admin/appointments" class="nav-link">
        <i class="nav-icon fas fa-clock"></i>
        <p>Agregar Turnos</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Panel Admin</p>
    </a>
</li>

@endif
@if(Auth::user()->isadmin)
<li class="nav-item">
    <a href="/calificaciones" class="nav-link {{ Request::is('calificaciones') ? 'active' : '' }}">
        <i class="nav-icon fas fa-star"></i>
        <p>Ver Calificaciones</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.index') }}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>Administrar Usuarios</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('contacts.index') }}" class="nav-link">
        <i class="nav-icon fas fa-envelope"></i>
        <p>Ver Mensajes</p>
    </a>
</li>
@endif
