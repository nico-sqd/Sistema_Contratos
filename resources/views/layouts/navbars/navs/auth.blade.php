<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="#">{{ $titlePage }}</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
    <span class="sr-only">Toggle navigation</span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <!--<form class="navbar-form">
        <div class="input-group no-border">
        <input type="text" value="" class="form-control" placeholder="Buscar...">
        <button type="submit" class="btn btn-white btn-round btn-just-icon">
          <i class="material-icons">search</i>
          <div class="ripple-container"></div>
        </button>
        </div>
      </form>-->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">
            <i class="material-icons">dashboard</i>
            <p class="d-lg-none d-md-block">
              {{ __('Stats') }}
            </p>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">notifications</i>
            <span class="notification">5</span>
            <p class="d-lg-none d-md-block">
              {{ __('Some Actions') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{route('contrato.index_alerta', ['diferencia'=>3, 'id_contratos'=>$nroContratos->pluck('id')->toArray()])}}">Alerta presupuesto/s ({{$nroContratos->count()}})</a>
            @if($contratosPorVencer != 0)
            <a class="dropdown-item" href="#">Alerta Contrato/s por vencer ({{$contratosPorVencer}})</a>
            @endif
            @if($boletasPorVencer != 0)
            <a class="dropdown-item" href="#">Alerta Boleta/s por vencer ({{$boletasPorVencer}})</a>
            @endif
            @if($multasPorVencer != 0)
            <a class="dropdown-item" href="#">Alerta Multa/s por vencer ({{$multasPorVencer}}) </a>
            @endif
            @if($contratosVencidos != 0)
            <a class="dropdown-item" href="#">Alerta Contrato/s vencidos ({{$contratosVencidos}})</a>
            @endif
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">person</i>
            <p class="d-lg-none d-md-block">
              {{ __('Account') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
            @can('_super')
            <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">{{ __('Perfil') }}</a>
            <a class="dropdown-item" href="{{ route('users.edit', Auth::user()->id) }}">{{ __('Editar Perfil') }}</a>
            @endcan
            @can('_admin')
            <a class="dropdown-item" href="{{ route('administradores.show_administrador', Auth::user()->id) }}">{{ __('Perfil') }}</a>
            <a class="dropdown-item" href="{{ route('administradores.edit_administrador', Auth::user()->id) }}">{{ __('Editar Perfil') }}</a>
            @endcan
            @can('referente')
            <a class="dropdown-item" href="{{ route('referentes.show_referente', Auth::user()->id) }}">{{ __('Perfil') }}</a>
            <a class="dropdown-item" href="{{ route('referentes.edit_referente', Auth::user()->id) }}">{{ __('Editar Perfil') }}</a>
            @endcan
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Cerrar Sesión') }}</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
