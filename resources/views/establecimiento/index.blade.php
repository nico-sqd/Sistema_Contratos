@extends('layouts.main', ['activePage' => 'establecimiento', 'titlePage' => 'Establecimientos'])
@section('content')
    <div class="content">
        <div class="container-fuid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-tittle">Establecimientos</h4>
                                    <div class="row">
                                        <div class="col-7 text-right d-felx">
                                            <form action="{{route('establecimiento.index')}}" method="get">
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
                                    <p class="card-category">Establecimientos Registrados</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <a href="{{ route('establecimiento.create') }}" class="btn btn-sm btn-facebook">Añadir Establecimientos</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>Establecimiento</th>
                                                <th>Abreviacion</th>
                                                <th>Codigo DEIS</th>
                                                <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                            @if (count($establecimientos)<=0)
                                                <div class="alert alert-danger" style="text-align:center" role="alert">
                                                    <h4>No se han encontrato establecimientos</h4>
                                                </div>
                                            @endif
                                                @forelse ($establecimientos as $establecimiento)
                                                <tr>
                                                    <td>{{ $establecimiento->establecimiento }}</td>
                                                    <td>{{ $establecimiento->abreviacion }}</td>
                                                    <td>{{ $establecimiento->codigo_deis }}</td>
                                                     <td class="td-actions text-right">
                                                        <a href="{{ route('establecimiento.edit', ['establecimiento' => $establecimiento->id]) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                        <form action="{{route('establecimiento.destroy', $establecimiento->id)}}" method="post" style="display: inline-block" onsubmit="return confirm('¿Estás seguro?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit" rel="tooltip">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @empty
                                                No permissions registered yet.
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--footer-->
                                <div class="card-footer ml-auto mr-auto">
                                    {{ $establecimientos ?? ''->links() }}
                                </div>
                                <!--End footer-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
