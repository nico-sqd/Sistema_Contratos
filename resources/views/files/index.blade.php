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
                                    <h4 class="card-tittle">Tabla de Archivos</h4>
                                    <div class="row">
                                        <div class="col-7 text-right d-felx">
                                            <form action="{{route('contratos.files.index', $contratos->id )}}" method="get">
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
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('contratos.files.store', $contratos->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                        @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @can('admin_create')
                                    <div class="row">
                                        <label for="res_aumento" class="col-sm-2 col-form-label">Documento</label>
                                        <div class="col-sm-7">
                                            @csrf
                                            <input type="file" name="nombre_archivo" id="" >
                                        </div>
                                    </div>
                                    @endcan
                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                                    </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>Nombre</th>
                                                <th>Archivo</th>
                                                <th>Acciones</th>
                                            </thead>
                                            <tbody>
                                                <tbody>
                                                    @foreach ($files as $file)
                                                        <tr>
                                                            <td>{{ $file->nombre_archivo }}</td>
                                                            <td><a href="{{ route('files.download', $file->uuid)}}">Descargar</a></td>
                                                            <td class="td-actions text-right">
                                                                @can('admin_destroy')
                                                                <form action="{{route('contratos.files.destroy',[$file->id, $contratos->id])}}" method="post" style="display: inline-block" onsubmit="return confirm('¿Estás seguro?')">
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
                                    {{ $files ?? ''->links() }}
                                </div>
                                <!--End footer-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
