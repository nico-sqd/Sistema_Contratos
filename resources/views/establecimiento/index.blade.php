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
                                        <div class="col-7 text-right">
                                            <form action="{{route('establecimiento.index')}}" method="get">
                                                <div class="form-row">
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" name="texto" value="{{$texto}}">
                                                    </div>
                                                    <div class="col-auto">
                                                        <input type="submit" class="btn btn-primary" value="Buscar">
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
                                                <th>ID</th>
                                                <th>Establecimiento</th>
                                                <th>Abreviacion</th>
                                                <th>Codigo DEIS</th>
                                                <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                                @forelse ($establecimientos as $establecimiento)
                                                <tr>
                                                    <td>{{ $establecimiento->id }}</td>
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
