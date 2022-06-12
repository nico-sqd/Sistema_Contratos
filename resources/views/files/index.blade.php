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
                                        <label for="res_aumento" class="col-sm-2 col-form-label">Subir Documento</label>
                                        <div class="col-sm-7">
                                            @csrf
                                            <input type="file" name="nombre_archivo" id="" accept="application/pdf, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/msword,image/*">
                                            @if(Session::has('errors'))
                                                <div class="alert alert-danger" style="text-align:center" role="alert">
                                                    <h4>{{Session::get('errors')->first()}}</h4>
                                                </div>
                                            @endif
                                            @error('nombre_archivo')
                                                <big class="text-danger">{{session('errors')->first('message1');}}</big>
                                            @enderror
                                        </div>
                                    </div>
                                    @endcan
                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                                        <a href="{{ route('contratos.index') }}" class="btn btn-facebook"><i class="material-icons">arrow_back</i></a>
                                    </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th >Nombre</th>
                                                <th>Fecha y Hora de creación</th>
                                                <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                                <tbody>
                                                    @if (count($files)<=0)
                                                    <div class="alert alert-danger" style="text-align:center" role="alert">
                                                        <h4>No se han encontrado archivos</h4>
                                                    </div>
                                                    @endif
                                                    @foreach ($files as $file)
                                                        <tr>
                                                            <td>{{ $file->nombre_archivo }}</td>
                                                            <td>{{ $file->created_at }}</td>
                                                            <td class="td-actions text-right">
                                                                <a href="{{ route('files.download', $file->uuid) }}" class="btn btn-info"><i class="material-icons">download</i></a>
                                                                @can('admin_destroy')
                                                                <form action="{{route('contratos.files.destroy',[$contratos, $file])}}" method="post" style="display: inline-block" onsubmit="return confirm('¿Estás seguro?')">
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
