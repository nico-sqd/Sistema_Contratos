@extends('layouts.main', ['activePage' => 'contratos', 'titlePage' => 'Multas'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('contratos.multas.store', $contratos->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-tittle">Multas</h4>
                            <p class="card-category">Agregar datos</p>
                        </div>
                        <div class="card-body">
                        <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('contratos.multas.index', $contratos->id) }}" class="btn btn-facebook"><i class="material-icons">arrow_back</i></a>
                                </div>
                            </div>
                            <div class="row">
                                <label for="nmr_memo_informe" class="col-sm-2 col-form-label">N° Memorándum Informe</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="nmr_memo_informe" placeholder="N° Memorándum Informe" value="{{old('nmr_memo_informe')}}" required oninvalid="this.setCustomValidity('Ingrese N° Memorándum Informe')" oninput="this.setCustomValidity('')"/>
                                    @if ($errors->has('nmr_memo_informe'))
                                        <span class="error text-danger" for="input-nmr_memo_informe">{{$errors -> first('nmr_memo_informe')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="nmr_oficio" class="col-sm-2 col-form-label">N° Oficio</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="nmr_oficio" placeholder="N° Oficio" value="{{old('nmr_oficio')}}">
                                    @if ($errors->has('nmr_oficio'))
                                        <span class="error text-danger" for="input-nmr_oficio">{{$errors -> first('nmr_oficio')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="fecha_oficio" class="col-sm-2 col-form-label">Fecha Oficio</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" name="fecha_oficio">
                                </div>
                            </div>
                            <div class="row">
                                <label for="fecha_notificacion" class="col-sm-2 col-form-label">Fecha Notificación</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control" name="fecha_notificacion">
                                </div>
                                <label for="plazo_dias_notificacion" class="col-sm-1 col-form-label">Plazo (Días)</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="plazo_dias_notificacion" placeholder="Número Días" value="{{old('plazo_dias_notificacion')}}">
                                    @if ($errors->has('plazo_dias_notificacion'))
                                        <span class="error text-danger" for="input-plazo_dias_notificacion">{{$errors -> first('plazo_dias_notificacion')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="fecha_oficio" class="col-sm-2 col-form-label">Presenta Descargos</label>
                                <div class="col-sm-3">
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                          <input class="form-check-input" type="radio" name="presenta_descargos" id="inlineRadio1" value=1> SI
                                          <span class="circle">
                                              <span class="check"></span>
                                          </span>
                                        </label>
                                      </div>
                                      <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                          <input class="form-check-input" type="radio" name="presenta_descargos" id="inlineRadio2" value=0> NO
                                          <span class="circle">
                                              <span class="check"></span>
                                          </span>
                                        </label>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="nmr_memo_juridica" class="col-sm-2 col-form-label">N° Memorándum Jurídica</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="nmr_memo_juridica" placeholder="N° Memorándum Jurídica" value="{{old('nmr_memo_juridica')}}">
                                    @if ($errors->has('nmr_memo_juridica'))
                                        <span class="error text-danger" for="input-nmr_memo_juridica">{{$errors -> first('nmr_memo_juridica')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="fecha_memo" class="col-sm-2 col-form-label">Fecha Memorándum</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" name="fecha_memo">
                                </div>
                            </div>
                            <div class="row">
                                <label for="nmr_res_exenta" class="col-sm-2 col-form-label">N° Resolución Exenta</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="nmr_res_exenta" placeholder="N° Resolución Exenta" value="{{old('nmr_res_exenta')}}">
                                    @if ($errors->has('nmr_res_exenta'))
                                        <span class="error text-danger" for="input-nmr_res_exenta">{{$errors -> first('nmr_res_exenta')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="fecha_res_exenta" class="col-sm-2 col-form-label">Fecha Resolución Exenta</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control" name="fecha_res_exenta">
                                </div>
                                <label for="plazo_dias_exenta" class="col-sm-1 col-form-label">Plazo (Días)</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="plazo_dias_exenta" placeholder="Número Días" value="{{old('plazo_dias_exenta')}}">
                                    @if ($errors->has('plazo_dias_exenta'))
                                        <span class="error text-danger" for="input-plazo_dias_exenta">{{$errors -> first('plazo_dias_exenta')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="fecha_oficio" class="col-sm-2 col-form-label">Presenta Recurso de Reposición</label>
                                <div class="col-sm-3">
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                          <input class="form-check-input" type="radio" name="presenta_rec_de_reposicion" id="inlineRadio1" value=1> SI
                                          <span class="circle">
                                              <span class="check"></span>
                                          </span>
                                        </label>
                                      </div>
                                      <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                          <input class="form-check-input" type="radio" name="presenta_rec_de_reposicion" id="inlineRadio2" value=0> NO
                                          <span class="circle">
                                              <span class="check"></span>
                                          </span>
                                        </label>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="nmr_memo_juridica_2" class="col-sm-2 col-form-label">N° Memorándum Jurídica</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="nmr_memo_juridica_2" placeholder="N° Memorándum Jurídica" value="{{old('nmr_memo_juridica_2')}}">
                                    @if ($errors->has('nmr_memo_juridica_2'))
                                        <span class="error text-danger" for="input-nmr_memo_juridica_2">{{$errors -> first('nmr_memo_juridica_2')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="nmr_res_exenta_2" class="col-sm-2 col-form-label">N° Resolución Exenta</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="nmr_res_exenta_2" placeholder="N° Resolución Exenta" value="{{old('nmr_res_exenta_2')}}">
                                    @if ($errors->has('nmr_res_exenta_2'))
                                        <span class="error text-danger" for="input-nmr_res_exenta_2">{{$errors -> first('nmr_res_exenta_2')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="fecha_res_exenta_2" class="col-sm-2 col-form-label">Fecha Resolución Exenta</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" name="fecha_res_exenta_2">
                                </div>
                            </div>
                            <div class="row">
                                <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="descripcion" placeholder="Descripción de la Multa" value="{{old('descripcion')}}">
                                    @if ($errors->has('descripcion'))
                                        <span class="error text-danger" for="input-descripcion">{{$errors -> first('descripcion')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_estadomulta" class="col-sm-2 col-form-label">Estado de Pago</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="id_estadomulta" name="id_estadomulta">
                                            <option hidden>Seleccione un Estado de Pago</option>
                                        @foreach ( $estadopagomulta as $pago )
                                            <option value="{{ $pago->id }}">{{ $pago->estado_pago }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="nmr_factura" class="col-sm-2 col-form-label">Factura N°</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="nmr_factura" id="nmr_factura" placeholder="Institución financiera" value="{{old('nmr_factura')}}">
                                    @if ($errors->has('nmr_factura'))
                                        <span class="error text-danger" for="input-nmr_factura">{{$errors -> first('nmr_factura')}}</span>
                                    @endif
                                </div>
                                <label for="nmr_ingreso" class="col-sm-0 col-form-label">Comprobante Ingreso N°</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="nmr_ingreso" id="nmr_ingreso" placeholder="Institución financiera" value="{{old('nmr_ingreso')}}">
                                    @if ($errors->has('nmr_ingreso'))
                                        <span class="error text-danger" for="input-nmr_ingreso">{{$errors -> first('nmr_ingreso')}}</span>
                                    @endif
                                </div>
                                <label for="fecha_comprobante" class="col-sm-0 col-form-label">Fecha</label>
                                <div class="col-sm-1">
                                    <input type="date" class="form-control" id="fecha_comprobante" name="fecha_comprobante">
                                </div>
                            </div>
                            <script
                                src="https://code.jquery.com/jquery-3.6.0.min.js"
                                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
                            </script>
                            <script>
                            $(document).ready(function() {
                                $('#nmr_ingreso').prop("disabled", true);
                                $('#nmr_factura').prop("disabled", true);
                                $('#fecha_comprobante').prop("disabled", true);
                                $('#id_estadomulta').change(function(e) {
                                    if ($(this).val() === "3" || $(this).val() === "4") {
                                        $('#nmr_ingreso').prop("disabled", false);
                                    } else {
                                        $('#nmr_ingreso').prop("disabled", true);
                                    }
                                    if ($(this).val() === "1") {
                                        $
                                    }
                                })
                                $('#id_estadomulta').change(function(e) {
                                    if ($(this).val() !== "2") {
                                        $('#nmr_factura').prop("disabled", true);
                                    } else {
                                        $('#nmr_factura').prop("disabled", false);
                                    }
                                    if ($(this).val() === "1") {
                                        $
                                    }
                                })
                                $('#id_estadomulta').change(function(e) {
                                    if ($(this).val() === "3" || $(this).val() === "4") {
                                        $('#fecha_comprobante').prop("disabled", false);
                                    } else {
                                        $('#fecha_comprobante').prop("disabled", true);
                                    }
                                })
                            });
                            </script>
                            <div class="row">
                                <label for="id_estadotramite" class="col-sm-2 col-form-label">Estado de Trámite</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_estadotramite">
                                        @foreach ( $estadotramitemulta as $pago )
                                            <option value="{{ $pago->id }}">{{ $pago->estado_tramite }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                        <!--footers-->
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('Agregar') }}</button>
                        </div>
                        <!--End footer-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
