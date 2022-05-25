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
                                            <form action="{{route('contratos.index')}}" method="get">
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
                                            @can('user_create')
                                            <a href="{{ route('contratos.create') }}" class="btn btn-sm btn-facebook">Añadir Contrato</a>
                                            @endcan
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>ID Licitacion</th>
                                                <th>Convenios</th>
                                                <th>Vigencia inicio</th>
                                                <th>Vigencia Fin</th>
                                                <th>Monto</th>
                                                <th>Referente</th>
                                                <th>Proveedor</th>
                                                <th>Administrador</th>
                                                <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                            @if (count($contratos)<=0)
                                                <div class="alert alert-danger" style="text-align:center" role="alert">
                                                    <h4>No se han encontrado contratos</h4>
                                                </div>
                                            @endif
                                            @foreach ($contratos as $contrato)
                                                <tr>
                                                    <td>{{ $contrato->convenio->id_licitacion }}</td>
                                                    <td>{{ $contrato->convenio->convenio }}</td>
                                                    <td>{{ $contrato->convenio->vigencia_inicio }}</td>
                                                    <td>{{ $contrato->convenio->vigencia_fin }}</td>
                                                    <td>{{ $contrato->monto->moneda }}</td>
                                                    <td>{{ $contrato->convenio->user->name }}</td>
                                                    <td>{{ $contrato->convenio->proveedor->nombre_proveedor }}</td>
                                                    <td>{{ $contrato->convenio->admin }}</td>
                                                    <td class="td-actions text-right">
                                                        <a href="{{ route('contratos.show', $contrato->id) }}" class="btn btn-info"><i class="material-icons">library_books</i></a>
                                                        <a href="{{ route('contratos.edit', $contrato->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                        <form action="{{route('contratos.destroy', $contrato->id)}}" method="post" style="display: inline-block" onsubmit="return confirm('¿Estás seguro?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit" rel="tooltip">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--footer-->
                                <div class="card-footer ml-auto mr-auto">
                                    {{ $contratos->links() }}
                                </div>
                                <!--End footer-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
