@extends('layouts.main', ['activePage' => 'convenios', 'titlePage' => 'Convenios'])
@section('content')
    <div class="content">
        <div class="container-fuid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-tittle">Tablas de Convenios</h4>
                                    <div class="row">
                                        <div class="col-7 text-right d-felx">
                                            <form action="{{route('convenios.index')}}" method="get">
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
                                    <p class="card-category">Datos de Convenio</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            @can('admin_create')
                                            <a href="{{ route('convenios.create') }}" class="btn btn-sm btn-facebook">Añadir Convenio</a>
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
                                            @if (count($convenios)<=0)
                                                <div class="alert alert-danger" style="text-align:center" role="alert">
                                                    <h4>No se han encontrado convenios</h4>
                                                </div>
                                            @endif
                                                @foreach ($convenios as $convenio)
                                                <tr>
                                                    <td>{{ $convenio->id_licitacion }}</td>
                                                    <td>{{ $convenio->convenio }}</td>
                                                    <td>{{ $convenio->vigencia_inicio }}</td>
                                                    <td>{{ $convenio->vigencia_fin }}</td>
                                                    <td>{{ $convenio->monto }}</td>
                                                    <td>{{ $convenio->user->name }}</td>
                                                    <td>{{ $convenio->proveedor->nombre_proveedor }}</td>
                                                    <td>{{ $convenio->admin }}</td>
                                                    <td class="td-actions text-right">
                                                        @can('show')
                                                        <a href="{{ route('convenios.show', $convenio->id) }}" class="btn btn-info"><i class="material-icons">library_books</i></a>
                                                        @endcan
                                                        @can('admin_edit')
                                                        <a href="{{ route('convenios.edit', $convenio->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                        @endcan
                                                        @can('admin_destroy')
                                                        <form action="{{route('convenios.destroy', $convenio->id)}}" method="post" style="display: inline-block" onsubmit="return confirm('¿Estás seguro?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit" rel="tooltip">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                        </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--footer-->
                                <div class="card-footer ml-auto mr-auto">
                                    {{ $convenios->links() }}
                                </div>
                                <!--End footer-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
