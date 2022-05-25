<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('/img/sidebar-1.jpg') }}">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Creative Tim') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      @can('user_index')
      <li class="nav-item{{ $activePage == 'usuarios' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
          <i class="material-icons">person</i>
            <p>Usuario</p>
        </a>
      </li>
      @endcan

      <li class="nav-item{{ $activePage == 'administradores' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('administradores.index_administrador') }}">
          <i class="material-icons">person</i>
            <p>Administradores</p>
        </a>
      </li>


      <li class="nav-item{{ $activePage == 'referentes' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('referentes.index_referente') }}">
          <i class="material-icons">person</i>
            <p>Referentes</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'establecimiento' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('establecimiento.index') }}">
          <i class="material-icons">home_work</i>
            <p>Establecimientos</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'proveedor' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('proveedor.index') }}">
          <i class="material-icons">person</i>
            <p>{{ __('Proveedores') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'contratos' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('contratos.index') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Contratos') }}</p>
        </a>
      </li>
      @can('permission_index')
      <li class="nav-item{{ $activePage == 'permissions' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('permissions.index') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Permisos') }}</p>
        </a>
      </li>
      @endcan
      @can('role_index')
      <li class="nav-item{{ $activePage == 'roles' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('roles.index') }}">
          <i class="material-icons">work_outline</i>
            <p>{{ __('Roles') }}</p>
        </a>
      </li>
      @endcan
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notificaciones') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
