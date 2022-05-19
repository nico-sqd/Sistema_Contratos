@extends('layouts.main', ['activePage' => 'caratulas', 'titlePage' => 'Caratulas'])
@section('content')
    <div class="content">
        <div class="container-fuid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-tittle">Tablas de Caratulas</h4>
                                    <p class="card-category">Datos de Caratulas</p>
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
                                            <a href="{{ route('caratula.create') }}" class="btn btn-sm btn-facebook">Añadir Caratula</a>
                                            @endcan
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>Proveedor</th>
                                                <th>ID Licitacion</th>
                                                <th>ID Contrato</th>
                                                <th>Referente</th>
                                                <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                            @foreach ($caratulas as $caratula)
                                                <tr>
                                                    <td>{{ $caratula->proveedor->nombre_proveedor }}</td>
                                                    <td>{{ $caratula->convenio->id_licitacion }}</td>
                                                    <td>{{ $caratula->contrato->id_contrato }}</td>
                                                    <td>{{ $caratula->convenio->user->name }}</td>
                                                    <td class="td-actions text-right">
                                                        <a href="{{ route('caratula.show', $caratula->id) }}" class="btn btn-info"><i class="material-icons">library_books</i></a>
                                                        <a href="{{ route('caratula.edit', $caratula->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                        @can('proveedor_destroy')
                                                        <form action="{{route('caratulas.delete', $caratula->id)}}" method="post" style="display: inline-block" onsubmit="return confirm('¿Estás seguro?')">
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
                                    {{ $caratulas->links() }}
                                </div>
                                <!--End footer-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
