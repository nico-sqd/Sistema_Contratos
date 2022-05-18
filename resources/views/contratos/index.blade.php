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
                                    <h4 class="card-tittle">Tablas de Contratos PIPO GUZMAN</h4>
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
                                            @can('user_create')
                                            <a href="{{ route('contratos.create') }}" class="btn btn-sm btn-facebook">Añadir Proveedor</a>
                                            @endcan
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>ID</th>
                                                <th>Resolucion de Adj.</th>
                                                <th>Resolucion Aprueba Cont.</th>
                                                <th>Monto</th>
                                                <th>ID Boleta</th>
                                                <th>Aumento Contrato/th>
                                                <th>Resolucion de Aumento</th>
                                                <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                            @foreach ($contratos as $contrato)
                                                <tr>
                                                    <td>{{ $contrato->id_contrato }}</td>
                                                    <td>{{ $contrato->res_adjudicacion }}</td>
                                                    <td>{{ $contrato->res_aprueba_contrato }}</td>
                                                    <td>{{ $contrato->monto->id_monto }}</td>
                                                    <td>{{ $contrato->boletagarantia->id_boleta }}</td>
                                                    <td>{{ $contrato->modalidad->id_modalidad}}</td>
                                                    <td>{{ $contrato->aumneto_contrato}}</td>
                                                    <td>{{ $contrato->res_aumento }}</td>
                                                    <td class="td-actions text-right">
                                                        @can('proveedor_edit')
                                                        <a href="{{ route('contratos.edit', $contrato->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                        @endcan
                                                        @can('proveedor_destroy')
                                                        <form action="{{route('contratos.delete', $contrato->id)}}" method="post" style="display: inline-block" onsubmit="return confirm('¿Estás seguro?')">
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
