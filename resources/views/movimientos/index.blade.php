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
                                        <a href="#" class="btn btn-facebook">Añadir Movimiento</a>
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
                                          </thead>
                                          <tbody>
                                          @if (count($movimientos)<=0)
                                          <div class="alert alert-danger" style="text-align:center" role="alert">
                                              <h4>No se han encontrato multas</h4>
                                          </div>
                                          @endif
                                          @foreach ( $movimientos as $movimientos )
                                              <tr>
                                                <td>{{$movimientos->contrato->id_contrato}}</td>
                                            </tr>
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
                                            <th>Monto Contrato</th>
                                            <th>Monto Consumido</th>
                                          </thead>
                                          <tbody>
                                          @if (count($movimientos)<=0)
                                          <div class="alert alert-danger" style="text-align:center" role="alert">
                                              <h4>No se han encontrato multas</h4>
                                          </div>
                                          @endif
                                          @foreach ( $movimientos as $movimientos )
                                              <tr>
                                                <td>{{$movimientos->contrato->id_contrato}}</td>
                                            </tr>
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
                                                    <th>Recepción</th>
                                                    <th>Saldo Pendiente Recepcionar</th>
                                                </thead>
                                                <tbody>
                                                @if (count($movimientos)<=0)
                                                    <div class="alert alert-danger" style="text-align:center" role="alert">
                                                        <h4>No se han encontrato multas</h4>
                                                    </div>
                                                @endif
                                                @foreach ( $movimientos as $movimientos )
                                                    <tr>
                                                        <td>{{$movimientos->contrato->id_contrato}}</td>
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
            </div>
        </div>
    </div>
@endsection
