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
                                            @can('admin_create')
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
                                                        <a href="{{ route('files.store', $contrato->id) }}" class="btn btn-info"><i class="material-icons">library_books</i></a>
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
{{--
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="cold-md-8">
            <div class="card">
                <div class="card-header">{{ __('Subir Archivos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-succes" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('files.store') }}"
                    enctype="multipart/form-data">
                        <input type="file" class="form-control" name="files[]" multiple>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
--}}
