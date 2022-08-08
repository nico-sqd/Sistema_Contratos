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
                                    <h4 class="card-tittle">{{ $multa->nmr_memo_informe }}</h4>
                                    <p class="card-category">Datos de {{$multa->nmr_memo_informe}}</p>
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-12 text-right">
                                           <a href="{{ route('contratos.multas.index', $contratos->id) }}" class="btn btn-facebook"><i class="material-icons">arrow_back</i></a>
                                        </div>
                                    </div>
                                    <div class="container p-3 my-3 border">
                                        <div class="h5">N° Memorándum Informe: {{$multa->nmr_memo_informe}}</div>
                                        <div class="h5">N° Oficio: {{$multa->nmr_oficio}}</div>
                                        <div class="h5">Fecha Oficio: {{$multa->fecha_oficio}}</div>
                                        <div class="h5">Fecha Notificación: {{$multa->fecha_notificacion}} Plazo Días: {{$multa->plazo_dias_notificacion}}</div>
                                        @if ($multa->presenta_descargos == 0)
                                            <div class="h5">Presenta Descargos: NO</div>
                                        @endif
                                        @if ($multa->presenta_descargos == 1)
                                            <div class="h5">Presenta Descargos: SI</div>
                                        @endif
                                        <div class="h5">N° Memorándum Jurídica: {{$multa->nmr_memo_juridica}}</div>
                                        <div class="h5">Fecha Memorándum: {{$multa->nmr_oficio}}</div>
                                        <div class="h5">N° Resolución Exenta: {{$multa->nmr_res_exenta}}</div>
                                        <div class="h5">Fecha Resolución Exenta: {{$multa->fecha_res_exenta}} Plazo Días: {{$multa->plazo_dias_exenta}}</div>
                                        @if ($multa->presenta_rec_de_reposicion == 0)
                                            <div class="h5">Presenta Descargos: NO</div>
                                        @endif
                                        @if ($multa->presenta_rec_de_reposicion == 1)
                                            <div class="h5">Presenta Descargos: SI</div>
                                        @endif
                                        <div class="h5">N° Memorándum Jurídica: {{$multa->nmr_memo_juridica_2}}</div>
                                        <div class="h5">N° Resolución Exenta: {{$multa->nmr_res_exenta_2}}</div>
                                        <div class="h5">Fecha Resolución Exenta: {{$multa->fecha_res_exenta_2}}</div>
                                        <div class="h5">Descripción: {{$multa->descripcion}}</div>
                                        @if ($multa->estadopagomulta->id == 1)
                                            <div class="h5">Estado de Pago: {{$multa->estadopagomulta->estado_pago}}</div>
                                        @endif
                                        @if ($multa->estadopagomulta->id == 2)
                                            <div class="h5">Estado de Pago: {{$multa->estadopagomulta->estado_pago}}</div>
                                            <div class="h5">Factura N°: {{$multa->nmr_factura}}</div>
                                        @endif
                                        @if ($multa->estadopagomulta->id == 3)
                                            <div class="h5">Estado de Pago: {{$multa->estadopagomulta->estado_pago}}</div>
                                            <div class="h5">Comprobante Ingreso N°: {{$multa->nmr_ingreso}}</div>
                                            <div class="h5">Fecha: {{$multa->fecha_comprobante}}</div>
                                        @endif
                                        @if ($multa->estadopagomulta->id == 4)
                                            <div class="h5">Estado de Pago: {{$multa->estadopagomulta->estado_pago}}</div>
                                            <div class="h5">Comprobante Ingreso N°: {{$multa->nmr_ingreso}}</div>
                                            <div class="h5">Fecha: {{$multa->fecha_comprobante}}</div>
                                        @endif
                                        <div class="h5">Estado de Trámite: {{$multa->estadotramitemulta->estado_tramite}}</div>
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
