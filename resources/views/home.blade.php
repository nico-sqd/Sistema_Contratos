@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_copy</i>
              </div>
              <p class="card-category">Contratos Activos</p>
              <h3 class="card-title">
                @foreach ($contratos as $contrato)
                    <?php
                        $contador = 0;
                        if ($contrato->estado_contrato == 5 ){
                            $contador += 1;
                        }
                    ?>
                @endforeach
                @if (count($contratos) >= 2)
                    {{count($contratos) - $contador}} <small>Contratos</small>
                @elseif (count($contratos) == 1)
                    1 <small>Contrato</small>
                @else
                    <small>No hay contratos activos</small>
                @endif
              </h3>
            </div>
            <div class="card-footer">
            @if (count($boleta)>=1)
                <div class="stats">
                  <i class="material-icons text-success">library_books</i>
                  <a href="{{route('contratos.index')}}">Ver Contratos</a>
                </div>
            @endif
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Garantías por vencer</p>
              <h3 class="card-title">
                @if (count($boleta)>=1)
                <?php
                    $contador = 0;
                ?>
                @foreach ($boleta as $garantia)
                    <?php
                        $fecha = new DateTime ($garantia->fecha_vencimiento);
                        $fechahoy = new DateTime(date('Y-m-d'));
                        $diferencia = $fecha->diff($fechahoy);
                        if ($diferencia->y == 0 && $diferencia->m <= "3" && $diferencia->m > "0"|| $diferencia->y == 0 && $diferencia->d <= "31" && $diferencia->m < "3" && $diferencia->m > "0"){
                            $contador += 1;
                        }
                    ?>
                @endforeach
                @endif
                @if ($contador>=1)
                    {{$contador}} <small>Boletas por vencer</small>
                @else
                    <small>Sin boletas por vencer</small>
                @endif
              </h3>
            </div>
            <div class="card-footer">
            @if ($contador>=1)
                <div class="stats">
                  <i class="material-icons text-success">library_books</i>
                  <a href="{{route('contratos.index')}}">Ver Contratos</a>
                </div>
            @endif
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Documentos ya vencidos</p>
              <h3 class="card-title">
                @if (count($boleta)>=1)
                <?php
                      $contador = 0;
                  ?>
                @foreach ($boleta as  $boletas)
                  <?php
                      $fecha = new DateTime ($boletas->fecha_vencimiento);
                      $fechahoy = new DateTime(date('Y-m-d'));
                      $diferencia = $fecha->diff($fechahoy);
                      if ($diferencia->y == 0 && $diferencia->m == 0 && $diferencia->d >= 0){
                          $contador += 1;
                      }
                  ?>
                @endforeach
                @endif
                @if ($contador>=1)
                    {{$contador}} <small>Documentos vencidos</small>
                @else
                    <small>Sin documentos vencidos</small>
                @endif
              </h3>
            </div>
            <div class="card-footer">
            @if ($contador>=1)
              <div class="stats">
                <i class="material-icons text-success">library_books</i>
                <a href="{{route('contratos.index')}}">Ver Contratos</a>
              </div>
            @endif
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fa fa-twitter"></i>
              </div>
              <p class="card-category">Followers</p>
              <h3 class="card-title">+245</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i> Just Updated
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-success">
              <div class="ct-chart" id="dailySalesChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Alerta Baja</h4>
              <p class="card-category">
                <?php
                    $contador = 0;
                ?>
                @foreach ($multas as $multa)
                  <?php
                      $fecha = new DateTime ($multa->fecha_notificacion);
                      $fechahoy = new DateTime(date('Y-m-d'));
                      $diferencia = $fecha->diff($fechahoy);
                      if ($diferencia->y == 0 && $diferencia->m <= 6 && $diferencia->m >= 3){
                        $contador += 1;
                      }
                  ?>
                @endforeach
                @if ($contador >= 1)
                    <h4 style="text-align:center">{{$contador}} Multas por vencer</h4>
                @else
                      <h4 style="text-align: center">Sin multas por vencer</h4>
                @endif
              </p>
            </div>
            <div class="card-footer">
            @if ($contador >= 1)
                <div class="stats">
                    <i class="material-icons text-success">visibility</i>
                    <a href="{{route('contratos.multas.index', [$multa->contrato->id,'diferencia'=>$diferencia->m])}}">Ver multa</a>
                </div>
            @endif
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-warning">
              <div class="ct-chart" id="websiteViewsChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Alerta Mediana</h4>
              <p class="card-category">
            <?php
                $contador = 0;
            ?>
            @foreach ($multas as $multass)
              <?php
                  $fecha = new DateTime ($multass->fecha_notificacion);
                  $fechahoy = new DateTime(date('Y-m-d'));
                  $diferencia = $fecha->diff($fechahoy);
                  if ($diferencia->y == 0 && $diferencia->m < 3 && $diferencia->m > 1){
                    $contador += 1;
                  }
              ?>
            @endforeach
            @if ($contador >= 1)
                <h4 style="text-align:center">{{$contador}} Multas por vencer</h4>
            @else
                  <h4 style="text-align: center">Sin multas por vencer</h4>
            @endif
            </p>
            </div>
            <div class="card-footer">
                @if ($contador >= 1)
                    <div class="stats">
                        <i class="material-icons text-success">visibility</i>
                        <a href="{{route('contratos.multas.index', [$multa->contrato->id,'diferencia'=>$diferencia->m])}}">Ver multa</a>
                    </div>
                @endif
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-danger">
              <div class="ct-chart" id="completedTasksChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Alerta Máxima</h4>
              <p class="card-category">
            <?php
                $contador = 0;
            ?>
            @foreach ($multas as $multass)
              <?php
                  $fecha = new DateTime ($multass->fecha_notificacion);
                  $fechahoy = new DateTime(date('Y-m-d'));
                  $diferencia = $fecha->diff($fechahoy);
                  if ($diferencia->y == 0 && $diferencia->m <= 1 && $diferencia->m >= 0){
                    $contador += 1;
                  }
              ?>
            @endforeach
            @if ($contador >= 1)
                <h4 style="text-align:center">{{$contador}} Multas por vencer</h4>
            @else
                  <h4 style="text-align: center">Sin multas por vencer</h4>
            @endif
            </p>
            </div>
            <div class="card-footer">
                @if ($contador >= 1)
                <div class="stats">
                    <i class="material-icons text-success">visibility</i>
                    <a href="{{route('contratos.multas.index', [$multa->contrato->id,'diferencia'=>$diferencia->m])}}">Ver multa</a>
                </div>
                @endif
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <span class="nav-tabs-title">Contratos:</span>
                  <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#profile" data-toggle="tab">
                        <i class="material-icons">library_books</i> Vigentes
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#messages" data-toggle="tab">
                        <i class="material-icons">library_books</i> Termino Anticipado
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#settings" data-toggle="tab">
                        <i class="material-icons">library_books</i> Cerrado
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="profile">
                  <table class="table">
                  <thead class="text-danger">
                  <th>ID Contrato</th>
                  <th>Convenio</th>
                  <th>Proveedor</th>
                  <th>Referente</th>
                  <th>Acciones</th>
                </thead>
                    <tbody>
                      @foreach ($contratos as $pendientes)
                        @if ($pendientes->estado_contrato == 1)
                          <td>{{$pendientes->id_contrato}}</td>
                          <td>{{$pendientes->convenio->convenio}}</td>
                          <td>{{$pendientes->convenio->proveedor->nombre_proveedor}}</td>
                          <td>{{$pendientes->convenio->user->name}}</td>
                          <td class="td-actions text-right">
                            <a href="{{ route('contratos.show', $pendientes->id) }}" class="btn btn-info"><i class="material-icons">library_books</i></a>
                          </td>
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="messages">
                  <table class="table">
                    <tbody>
                    <table class="table">
                  <thead class="text-danger">
                  <th>ID Contrato</th>
                  <th>Convenio</th>
                  <th>Proveedor</th>
                  <th>Referente</th>
                  <th>Acciones</th>
                </thead>
                    <tbody>
                      @foreach ($contratos as $pendientes)
                        @if ($pendientes->estado_contrato == 3)
                          <td>{{$pendientes->id_contrato}}</td>
                          <td>{{$pendientes->convenio->convenio}}</td>
                          <td>{{$pendientes->convenio->proveedor->nombre_proveedor}}</td>
                          <td>{{$pendientes->convenio->user->name}}</td>
                          <td class="td-actions text-right">
                            <a href="{{ route('contratos.show', $pendientes->id) }}" class="btn btn-info"><i class="material-icons">library_books</i></a>
                          </td>
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="settings">
                  <table class="table">
                    <tbody>
                    <table class="table">
                  <thead class="text-danger">
                  <th>ID Contrato</th>
                  <th>Convenio</th>
                  <th>Proveedor</th>
                  <th>Referente</th>
                  <th>Acciones</th>
                </thead>
                    <tbody>
                      @foreach ($contratos as $pendientes)
                        @if ($pendientes->estado_contrato == 5)
                          <td>{{$pendientes->id_contrato}}</td>
                          <td>{{$pendientes->convenio->convenio}}</td>
                          <td>{{$pendientes->convenio->proveedor->nombre_proveedor}}</td>
                          <td>{{$pendientes->convenio->user->name}}</td>
                          <td class="td-actions text-right">
                            <a href="{{ route('contratos.show', $pendientes->id) }}" class="btn btn-info"><i class="material-icons">library_books</i></a>
                          </td>
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-danger">
              <h4 class="card-title">Multas Pendientes</h4>
              <p class="card-category">Multas pendientes de los contratos hasta la fecha</p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-danger">
                  <th>ID Contrato</th>
                  <th>N° Memorándum Informe</th>
                  <th>Fecha Notificación</th>
                  <th>Plazo Días</th>
                  <th>Acciones</th>
                </thead>
                <tbody>
                @if (count($multas)<=0)
                <div class="alert alert-danger" style="text-align:center" role="alert">
                    <h4>No se han encontrato multas</h4>
                </div>
                @endif
                @foreach ( $multas as $multas )
                    <tr>
                      <td>{{$multas->contrato->id_contrato}}</td>
                      <td>{{$multas->nmr_memo_informe}}</td>
                      <td>{{$multas->fecha_notificacion}}</td>
                      <td>{{$multas->plazo_dias_notificacion}}</td>
                      <?php
                        $fecha = new DateTime ($multas->fecha_notificacion);
                        $fechahoy = new DateTime(date('Y-m-d'));
                        $diferencia = $fecha->diff($fechahoy);
                      ?>
                      @if ($diferencia->y == 0 && $diferencia->m == 0 && $diferencia->d <= 15)
                        <td>Quedan {{$diferencia->d}} días</td>
                        @endif
                      <td class="td-actions text-right">
                        <a href="{{ route('contratos.show', $multas->contrato->id) }}" class="btn btn-info"><i class="material-icons">library_books</i></a>
                        <a href="{{ route('contratos.multas.show', [$multas->contrato->id,$multas]) }}" class="btn btn-danger"><i class="material-icons">visibility</i></a>
                      </td>
                  </tr>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection



