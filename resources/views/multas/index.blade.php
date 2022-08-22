@extends('layouts.main', ['activePage' => 'contratos', 'titlePage' => 'Multas'])
@section('content')
    <div class="content">
        <div class="container-fuid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-tittle">Tablas de Multas</h4>
                                    <div class="row">
                                        <div class="col-7 text-right d-felx">
                                            <form action="{{route('contratos.multas.index', [$contratos->id,$diferencia])}}" method="get">
                                                {{dd($diferencia)}}
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
                                    <p class="card-category">Datos de Multas</p>
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <a href="{{ url()->route('contratos.show', $contratos->id) }}" class="btn btn-facebook"><i class="material-icons">arrow_back</i></a>
                                            @can('admin_create')
                                            <a href="{{ route('contratos.multas.create', $contratos->id) }}" class="btn btn-sm btn-danger">Añadir Multa</a>
                                            @endcan
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>Descripción</th>
                                                <th>Estado de tramite</th>
                                                <th>Estado de pago multa</th>
                                                <th>Fecha Oficio</th>
                                                <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                            @if (count($multas)<=0)
                                                <div class="alert alert-danger" style="text-align:center" role="alert">
                                                    <h4>No se han encontrado multas</h4>
                                                </div>
                                            @endif
                                            @foreach ($multas as $multa)
                                                @if ($diferencia <="15" && $diferencia >="11")                    
                                                    @if ($multa->id_contrato == $contratos->id)
                                                        <tr>
                                                            <td>{{ $multa->descripcion }}</td>
                                                            <td>{{ $multa->estadotramitemulta->estado_tramite }}</td>
                                                            <td>{{ $multa->estadopagomulta->estado_pago }}</td>
                                                            <td>{{ $multa->fecha_oficio }}</td>
                                                            <td class="td-actions text-right">
                                                                @can('show')
                                                                <a href="{{ route('contratos.multas.show', [$contratos,$multa]) }}" class="btn btn-info"><i class="material-icons">library_books</i></a>
                                                                @endcan
                                                                @can('admin_edit')
                                                                <a href="{{ route('contratos.multas.edit', [$contratos, $multa]) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                                @endcan
                                                                @can('admin_destroy')
                                                                <form action="{{route('contratos.multas.destroy', [$contratos,$multa])}}" method="post" style="display: inline-block" onsubmit="return confirm('¿Estás seguro?')">
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
                                                @endif
                                                @if ($diferencia <=" ")
                                                    @if ($multa->id_contrato == $contratos->id)
                                                        <tr>
                                                            <td>{{ $multa->descripcion }}</td>
                                                            <td>{{ $multa->estadotramitemulta->estado_tramite }}</td>
                                                            <td>{{ $multa->estadopagomulta->estado_pago }}</td>
                                                            <td>{{ $multa->fecha_oficio }}</td>
                                                            <td class="td-actions text-right">
                                                                @can('show')
                                                                <a href="{{ route('contratos.multas.show', [$contratos,$multa]) }}" class="btn btn-info"><i class="material-icons">library_books</i></a>
                                                                @endcan
                                                                @can('admin_edit')
                                                                <a href="{{ route('contratos.multas.edit', [$contratos, $multa]) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                                @endcan
                                                                @can('admin_destroy')
                                                                <form action="{{route('contratos.multas.destroy', [$contratos,$multa])}}" method="post" style="display: inline-block" onsubmit="return confirm('¿Estás seguro?')">
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
