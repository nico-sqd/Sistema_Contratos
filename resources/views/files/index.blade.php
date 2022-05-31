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
                                            <form action="{{route('files.index')}}" method="get">
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
                                    <form action="{{ route('files.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                        @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="row">
                                        <label for="res_aumento" class="col-sm-2 col-form-label">Documento</label>
                                        <div class="col-sm-7">
                                            @csrf
                                            <input type="file" name="nombre_archivo" id="" >
                                        </div>
                                    </div>
                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                                    </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>Nombre</th>
                                                <th>Archivo</th>
                                            </thead>
                                            <tbody>
                                                <tbody>
                                                    @foreach ($files as $file)
                                                        <tr>
                                                            <td>{{ $file->nombre_archivo }}</td>
                                                            <td><a href="{{ route('files.download', $file->uuid)}}">Descargar</a></td>
                                                        </tr>
                                                        @endforeach
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--footer-->
                                <!--End footer-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
