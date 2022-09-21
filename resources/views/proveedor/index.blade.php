@extends('layouts.main', ['activePage' => 'proveedor', 'titlePage' => 'Proveedores'])
@section('content')
    <div class="content">
        <div class="container-fuid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-tittle">Tablas de Proveedores</h4>
                                    <div class="row">
                                        <div class="col-7 text-right d-felx">
                                            <form action="{{route('proveedor.index')}}" method="get">
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
                                    <p class="card-category">Datos de Proveedores</p>
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <a href="{{ route('proveedores.excel') }}" class="btn btn-sm btn-success">Exportar a Excel</a>
                                            @can('admin_create')
                                            <a href="{{ route('proveedor.create') }}" class="btn btn-sm btn-facebook">Añadir Proveedor</a>
                                            @endcan
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>Nombre</th>
                                                <th>RUT Proveedor</th>
                                                <th>Representante Legal</th>
                                                <th>RUN Representante Legal</th>
                                                <th>Correo</th>
                                                <th>Teléfono</th>
                                                <th>Direccion</th>
                                                <th>Comuna</th>
                                                <th>Region</th>
                                                <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                            @if (count($proveedores)<=0)
                                                <div class="alert alert-danger" style="text-align:center" role="alert">
                                                    <h4>No se han encontrado proveedores</h4>
                                                </div>
                                            @endif
                                            @foreach ($proveedores as $proveedor)
                                                <tr>
                                                    <td>{{ $proveedor->nombre_proveedor }}</td>
                                                    <td>{{ $proveedor->rut_proveedor }}</td>
                                                    <td>{{ $proveedor->representante }}</td>
                                                    <td>{{ $proveedor->rut_representante }}</td>
                                                    <td>{{ $proveedor->mail_representante }}</td>
                                                    <td>{{ $proveedor->telefono_representante }}</td>
                                                    <td>{{ $proveedor->direccion->direccion}}</td>
                                                    <td>{{ $proveedor->direccion->comuna }}</td>
                                                    <td>{{ $proveedor->direccion->region }}</td>
                                                    <td class="td-actions text-right">
                                                        @can('admin_edit')
                                                        <a href="{{ route('proveedor.edit', $proveedor->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                        @endcan
                                                        @can('admin_destroy')
                                                        <form action="{{ route('proveedor.destroy', $proveedor->id) }}" method="post" style="display: inline-block" onsubmit="return confirm('¿Estás seguro?')">
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
                                    {{ $proveedores->links() }}
                                </div>
                                <!--End footer-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
