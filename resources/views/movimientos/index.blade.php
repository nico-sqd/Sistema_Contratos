@extends('layouts.main', ['activePage' => 'contratos', 'titlePage' => 'Movimientos'])
@section('content')
    <div class="content">
        <div class="container-fuid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-tittle">Tablas de Multas</h4>
                                    <p class="card-category">Datos de Multas</p>
                                </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <a href="{{ route('contratos.movimientos.create', $contratos->id)}}" class="btn btn-facebook">Añadir Movimiento</a>
                                        <a href="{{ url()->route('contratos.show', $contratos->id) }}" class="btn btn-facebook" style="float: right;"><i class="material-icons">arrow_back</i></a>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="card">
                                      <div class="card-header card-header-primary">
                                        <h4 class="card-title">Multas Pendientes</h4>
                                        <p class="card-category">Multas pendientes de los contratos hasta la fecha</p>
                                      </div>
                                      <div class="card-body table-responsive">
                                        <table class="table table-hover">
                                          <thead class="text-primary">
                                            <th>Monto Contrato</th>
                                            <th>Monto Consumido</th>
                                            <th>Saldo Disponible</th>
                                          </thead>
                                          <tbody>
                                          @if (count($movimientos)<=0)
                                          <div class="alert alert-danger" style="text-align:center" role="alert">
                                              <h4>No se han encontrato multas</h4>
                                          </div>
                                          @endif
                                            @foreach ( $cantidades as  $canti)
                                                @if ($canti->movimiento->contrato->id == $contratos->id)
                                                    <tr>
                                                        <td>${{$canti->movimiento->contrato->monto->moneda}}</td>
                                                        <?php
                                                        $total_consumido = $canti->valor_unitario * $canti->cantidad;
                                                        ?>
                                                        <td>${{$canti->valor_unitario * $canti->cantidad}}</td>
                                                        @if ($canti->movimiento->monto_contrato_actualizado - $total_consumido < 0)
                                                                <td style="color:#ff0000">${{$canti->movimiento->monto_contrato_actualizado - $total_consumido}}</td>
                                                            @elseif ($canti->movimiento->monto_contrato_actualizado - $total_consumido > 0)
                                                                <td style="color:#008000">${{$canti->movimiento->monto_contrato_actualizado - $total_consumido}}</td>
                                                        @endif
                                                    </tr>
                                                @endif
                                            @endforeach
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-6 col-md-12">
                                    <div class="card">
                                      <div class="card-header card-header-primary">
                                        <h4 class="card-title">Multas Pendientes</h4>
                                        <p class="card-category">Multas pendientes de los contratos hasta la fecha</p>
                                      </div>
                                      <div class="card-body table-responsive">
                                        <table class="table table-hover">
                                          <thead class="text-primary">
                                            <th>Unidad de Medida</th>
                                            <th>Costo Unitario</th>
                                          </thead>
                                          <tbody>
                                            @foreach ( $cantidades as $cantidad )
                                                @if ($canti->movimiento->contrato->id == $contratos->id)
                                                    <tr>
                                                        <td>{{$cantidad->unidadmedida->unidad}}</td>
                                                        <td>${{$cantidad->valor_unitario}}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title">Multas Pendientes</h4>
                                        <p class="card-category">Multas pendientes de los contratos hasta la fecha</p>
                                    </div>
                                    <div class="card-body table-responsive">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="text-primary">
                                                    <th>ID Orden de Compra</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Cantidad</th>
                                                    <th>Valor Unitario</th>
                                                    <th>Valor OC</th>
                                                    <th>N° Factura</th>
                                                    <th>Fecha Factura</th>
                                                    <th>Valor Factura</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ( $cantidades as $cantidad )
                                                        @if ($canti->movimiento->contrato->id == $contratos->id)
                                                            <tr>
                                                                <td>{{$cantidad->movimiento->id_oc}}</td>
                                                                <td>{{$cantidad->unidadmedida->unidad}}</td>
                                                                <td>{{$cantidad->cantidad}}</td>
                                                                <td>${{$cantidad->valor_unitario}}</td>
                                                                <td>Pronto</td>
                                                                <td>{{$cantidad->movimiento->nmr_factura}}</td>
                                                                <td>{{$cantidad->movimiento->fecha_factura}}</td>
                                                                <td>{{$cantidad->movimiento->valor_factura}}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
