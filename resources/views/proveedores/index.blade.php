@extends('layouts.main', ['activePage' => 'proveedores', 'titlePage' => 'Proveedores'])
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
                                            @can('user_create')
                                            <a href="{{ route('proveedor.create') }}" class="btn btn-sm btn-facebook">Añadir Proveedor</a>
                                            @endcan
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>RUT Proveedor</th>
                                                <th>Representante Legal</th>
                                                <th>RUN Representante Legal</th>
                                                <th>Direccion</th>
                                                <th>Comuna</th>
                                                <th>Region</th>
                                                <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                            @foreach ($proveedores as $proveedor)
                                                <tr>
                                                    <td>{{ $proveedor->id }}</td>
                                                    <td>{{ $proveedor->nombre_proveedor }}</td>
                                                    <td>{{ $proveedor->rut_proveedor }}</td>
                                                    <td>{{ $proveedor->representante }}</td>
                                                    <td>{{ $proveedor->rut_representante }}</td>
                                                    <td>{{ $proveedor->direccion->direccion}}</td>
                                                    <td>{{ $proveedor->direccion->comuna }}</td>
                                                    <td>{{ $proveedor->direccion->region }}</td>
                                                    <td class="td-actions text-right">
                                                        @can('proveedor_show')
                                                        <a href="{{ route('proveedors.show', $proveedor->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                                                        @endcan
                                                        @can('proveedor_edit')
                                                        <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                        @endcan
                                                        @can('proveedor_destroy')
                                                        <form action="{{route('proveedors.delete', $proveedor->id)}}" method="post" style="display: inline-block" onsubmit="return confirm('¿Estás seguro?')">
                                                        @endcan
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
