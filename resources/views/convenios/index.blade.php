@extends('layouts.main', ['activePage' => 'convenios', 'titlePage' => 'Convenios'])
@section('content')
    <div class="content">
        <div class="container-fuid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-tittle">Tablas de Convenios</h4>
                                    <p class="card-category">Datos de Convenios</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <a href="{{ route('convenios.create') }}" class="btn btn-sm btn-facebook">Añadir Convenio</a>
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
                                                <th>Administrador</th>
                                                <th>Rut Proveedor</th>
                                                <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($convenios as $convenio)
                                                <tr>
                                                    <td>{{ $convenio->id_licitacion }}</td>
                                                    <td>{{ $convenio->convenio }}</td>
                                                    <td>{{ $convenio->vigencia_inicio }}</td>
                                                    <td>{{ $convenio->vigencia_fin }}</td>
                                                    <td>{{ $convenio->monto }}</td>
                                                    <td>{{ $convenio->admin }}</td>
                                                    <td>{{ $convenio->rut_proveedor }}</td>
                                                    <td class="td-actions text-right">
                                                        <a href="{{ route('convenio.edit', $convenio->id_licitacion) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                        <form action="{{route('convenio.destroy', $convenio->id_licitacion)}}" method="post" style="display: inline-block" onsubmit="return confirm('¿Estás seguro?')">
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
                                    {{ $convenios->links() }}
                                </div>
                                <!--End footer-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
