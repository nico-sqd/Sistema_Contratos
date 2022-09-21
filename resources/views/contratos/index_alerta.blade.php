@extends('layouts.main', ['activePage' => 'contratos', 'titlePage' => 'Contratos'])
@section('content')
    <div class="content">
        <div class="container-fuid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-tittle">Tablas de Contratos</h4>
                                    <div class="row">
                                        <div class="col-7 text-right d-felx">
                                            <form action="{{route('contrato.index_alerta', [$diferencia])}}" method="get">
                                                <div class="form-row">
                                                    <div class="col-sm-4 align-self-center" style="text-align: right">
                                                        <input type="text" class="form-control float-right" name="texto" value="{{$texto ?? ''}}" placeholder="Buscar...">
                                                    </div>
                                                    <div class="col-auto align-self-center">
                                                        <input type="submit" class="btn btn-primary float-right" value="Buscar">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <p class="card-category">Datos de Contratos</p>
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <a href="{{ route('home') }}" class="btn btn-facebook"><i class="material-icons">home</i> Home</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>ID Proceso Compra</th>
                                                <th>Convenios</th>
                                                <th>Vigencia inicio</th>
                                                <th>Vigencia Fin</th>
                                                <th>Monto</th>
                                                <th>Referente</th>
                                                <th>Proveedor</th>
                                                <th>Gestor</th>
                                                <th>Estado</th>
                                                <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                            @if (count($contratos)<=0)
                                                <div class="alert alert-danger" style="text-align:center" role="alert">
                                                    <h4>No se han encontrado contratos</h4>
                                                </div>
                                            @endif
                                            @foreach ($contratos as $contrato)
                                            @if ($diferencia <= "6" && $diferencia >"3" )
                                                    <tr>
                                                        <td>{{ $contrato->convenio->id_licitacion }}</td>
                                                        <td>{{ $contrato->convenio->convenio }}</td>
                                                        <td>{{ $contrato->convenio->vigencia_inicio }}</td>
                                                        <td>{{ $contrato->convenio->vigencia_fin }}</td>
                                                        <td>{{ $contrato->monto->moneda }}</td>
                                                        <td>{{ $contrato->convenio->user->name }}</td>
                                                        <td>{{ $contrato->convenio->proveedor->nombre_proveedor }}</td>
                                                        <td>{{ $contrato->convenio->admin }}</td>
                                                        @if ($contrato->estadocontrato->estado_contrato == "Cerrado" || $contrato->estadocontrato->estado_contrato == "Fin Presupuesto")
                                                            <td><font color="#FF0000">{{ $contrato->estadocontrato->estado_contrato }}</font></td>
                                                        @elseif ($contrato->estadocontrato->estado_contrato == "Terminado" || $contrato->estadocontrato->estado_contrato == "Termino Anticipado")
                                                            <td><font color="#FF9966">{{ $contrato->estadocontrato->estado_contrato }}</font></td>
                                                        @elseif ($contrato->estadocontrato->estado_contrato == "Vigente" || $contrato->estadocontrato->estado_contrato == "Modificado")
                                                            <td><font color="#008000">{{ $contrato->estadocontrato->estado_contrato }}</font></td>
                                                        @endif
                                                        <td class="td-actions text-right">
                                                            <a href="{{ route('contratos.files.index', $contrato->id) }}" class="btn btn-download"><i class="material-icons">download</i></a>
                                                            @can('show')
                                                            <a href="{{ route('contratos.show', $contrato->id) }}" class="btn btn-info"><i class="material-icons">library_books</i></a>
                                                            @endcan
                                                            @can('admin_edit')
                                                            <a href="{{ route('contratos.edit', $contrato->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                            @endcan
                                                            @can('admin_destroy')
                                                            <form action="{{route('contratos.destroy', $contrato->id)}}" method="post" style="display: inline-block" onsubmit="return confirm('¿Estás seguro?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit" rel="tooltip">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                            </form>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if ($diferencia <= "3" && $diferencia >"1")
                                                    <tr>
                                                        <td>{{ $contrato->convenio->id_licitacion }}</td>
                                                        <td>{{ $contrato->convenio->convenio }}</td>
                                                        <td>{{ $contrato->convenio->vigencia_inicio }}</td>
                                                        <td>{{ $contrato->convenio->vigencia_fin }}</td>
                                                        <td>{{ $contrato->monto->moneda }}</td>
                                                        <td>{{ $contrato->convenio->user->name }}</td>
                                                        <td>{{ $contrato->convenio->proveedor->nombre_proveedor }}</td>
                                                        <td>{{ $contrato->convenio->admin }}</td>
                                                        @if ($contrato->estadocontrato->estado_contrato == "Cerrado" || $contrato->estadocontrato->estado_contrato == "Fin Presupuesto")
                                                            <td><font color="#FF0000">{{ $contrato->estadocontrato->estado_contrato }}</font></td>
                                                        @elseif ($contrato->estadocontrato->estado_contrato == "Terminado" || $contrato->estadocontrato->estado_contrato == "Termino Anticipado")
                                                            <td><font color="#FF9966">{{ $contrato->estadocontrato->estado_contrato }}</font></td>
                                                        @elseif ($contrato->estadocontrato->estado_contrato == "Vigente" || $contrato->estadocontrato->estado_contrato == "Modificado")
                                                            <td><font color="#008000">{{ $contrato->estadocontrato->estado_contrato }}</font></td>
                                                        @endif
                                                        <td class="td-actions text-right">
                                                            <a href="{{ route('contratos.files.index', $contrato->id) }}" class="btn btn-download"><i class="material-icons">download</i></a>
                                                            @can('show')
                                                            <a href="{{ route('contratos.show', $contrato->id) }}" class="btn btn-info"><i class="material-icons">library_books</i></a>
                                                            @endcan
                                                            @can('admin_edit')
                                                            <a href="{{ route('contratos.edit', $contrato->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                            @endcan
                                                            @can('admin_destroy')
                                                            <form action="{{route('contratos.destroy', $contrato->id)}}" method="post" style="display: inline-block" onsubmit="return confirm('¿Estás seguro?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit" rel="tooltip">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                            </form>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (($diferencia == "1" || $diferencia =="0"))
                                                    <tr>
                                                        <td>{{ $contrato->convenio->id_licitacion }}</td>
                                                        <td>{{ $contrato->convenio->convenio }}</td>
                                                        <td>{{ $contrato->convenio->vigencia_inicio }}</td>
                                                        <td>{{ $contrato->convenio->vigencia_fin }}</td>
                                                        <td>{{ $contrato->monto->moneda }}</td>
                                                        <td>{{ $contrato->convenio->user->name }}</td>
                                                        <td>{{ $contrato->convenio->proveedor->nombre_proveedor }}</td>
                                                        <td>{{ $contrato->convenio->admin }}</td>
                                                        @if ($contrato->estadocontrato->estado_contrato == "Cerrado" || $contrato->estadocontrato->estado_contrato == "Fin Presupuesto")
                                                            <td><font color="#FF0000">{{ $contrato->estadocontrato->estado_contrato }}</font></td>
                                                        @elseif ($contrato->estadocontrato->estado_contrato == "Terminado" || $contrato->estadocontrato->estado_contrato == "Termino Anticipado")
                                                            <td><font color="#FF9966">{{ $contrato->estadocontrato->estado_contrato }}</font></td>
                                                        @elseif ($contrato->estadocontrato->estado_contrato == "Vigente" || $contrato->estadocontrato->estado_contrato == "Modificado")
                                                            <td><font color="#008000">{{ $contrato->estadocontrato->estado_contrato }}</font></td>
                                                        @endif
                                                        <td class="td-actions text-right">
                                                            <a href="{{ route('contratos.files.index', $contrato->id) }}" class="btn btn-download"><i class="material-icons">download</i></a>
                                                            @can('show')
                                                            <a href="{{ route('contratos.show', $contrato->id) }}" class="btn btn-info"><i class="material-icons">library_books</i></a>
                                                            @endcan
                                                            @can('admin_edit')
                                                            <a href="{{ route('contratos.edit', $contrato->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                            @endcan
                                                            @can('admin_destroy')
                                                            <form action="{{route('contratos.destroy', $contrato->id)}}" method="post" style="display: inline-block" onsubmit="return confirm('¿Estás seguro?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit" rel="tooltip">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                            </form>
                                                            @endcan
                                                        </td>
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
@endsection
