@extends('layouts.main', ['activePage' => 'contratos', 'titlePage' => 'Editar Contratos'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('contratos.update', $contratos->id)}}" method="post" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-tittle">contratos</h4>
                            <p class="card-category">Editar datos</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label for="id_licitacion" class="col-sm-2 col-form-label">ID Licitacion</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Seleccionar Tipo Licitacion</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_licitacion">
                                          @foreach ( $id_licitacion as $licitacion )
                                            <option value="{{ $licitacion->id }}" {{$contratos->licitacion == $licitacion->id ? 'selected' : ''}}>{{$licitacion->convenio}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_contrato" class="col-sm-2 col-form-label">ID Contrato</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="id_contrato" value="{{ old('id_contrato', $contratos->id_contrato) }}">
                                    @if ($errors->has('id_contrato'))
                                        <span class="error text-danger" for="input-id_contrato">{{$errors -> first('id_contrato')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="res_adjudicacion" class="col-sm-2 col-form-label">Resolucion de Adjudicacion</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="res_adjudicacion" value="{{ old('res_adjudicacion', $contratos->res_adjudicacion) }}" >
                                    @if ($errors->has('res_adjudicacion'))
                                        <span class="error text-danger" for="input-res_adjudicacion">{{$errors -> first('res_adjudicacion')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="res_apruebacontrato" class="col-sm-2 col-form-label">Resolucion Aprueba Contrato</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="res_apruebacontrato" value="{{ old('res_apruebacontrato', $contratos->res_apruebacontrato) }}" >
                                    @if ($errors->has('res_apruebacontrato'))
                                        <span class="error text-danger" for="input-res_apruebacontrato">{{$errors -> first('res_apruebacontrato')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="moneda" class="col-sm-2 col-form-label">Monto</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="moneda" value="{{ old('moneda', $contratos->monto->moneda) }}" >
                                    @if ($errors->has('moneda'))
                                        <span class="error text-danger" for="input-moneda">{{$errors -> first('moneda')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_tipo_moneda" class="col-sm-2 col-form-label">Tipo Moneda</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Seleccionar tipo de Moneda</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_tipo_moneda">
                                        @foreach ( $tipomoneda as $tipo )
                                            <option value="{{ $tipo->id_tipo}}" {{$contratos->id_tipo_moneda == $tipo->id_tipo ? 'selected' : ''}}>{{$tipo->Nombre_tipo}}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="monto_boleta" class="col-sm-2 col-form-label">Monto</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="monto_boleta" value="{{ old('monto_boleta', $contratos->montoboleta->monto_boleta) }}" >
                                    @if ($errors->has('monto_boleta'))
                                        <span class="error text-danger" for="input-monto_boleta">{{$errors -> first('monto_boleta')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_tipo_boleta" class="col-sm-2 col-form-label">ID Boleta</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Seleccionar tipo de Boleta de Garantía</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_tipo_boleta">
                                          @foreach ( $tipoboleta as $boletas )
                                            <option value="{{ $boletas->id }}" {{$contratos->id_boleta == $boletas->id ? 'selected' : ''}}>{{$boletas->documentos_garantia}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_modalidad" class="col-sm-2 col-form-label">ID Modalidad</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Seleccionar tipo de Modalidad</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_modalidad">
                                          @foreach ( $modalidad as $modalidad )
                                            <option value="{{ $modalidad->id }}" {{$contratos->id_modalidad == $modalidad->id ? 'selected' : ''}}>{{$modalidad->nombre_modalidad}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="aumento_contrato" class="col-sm-2 col-form-label">Aumento de Contrato</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="aumento_contrato" value="{{ old('aumento_contrato', $contratos->aumento_contrato) }}" >
                                    @if ($errors->has('aumento_contrato'))
                                        <span class="error text-danger" for="input-aumento_contrato">{{$errors -> first('aumento_contrato')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="res_aumento" class="col-sm-2 col-form-label">Resolucion de Aumento</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="res_aumento" value="{{ old('res_aumento', $contratos->res_aumento) }}" >
                                    @if ($errors->has('res_aumento'))
                                        <span class="error text-danger" for="input-res_aumento">{{$errors -> first('res_aumento')}}</span>
                                    @endif
                                </div>
                            </div>
                        <!--footer-->
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                        </div>
                        <!--End footer-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
