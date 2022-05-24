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
                                <div class="col-12 text-right">
                                    <a href="{{ url()->previous() }}" class="btn btn-facebook"><i class="material-icons">arrow_back</i></a>
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_licitacion" class="col-sm-2 col-form-label">ID Licitacion</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="id_licitacion" value="{{ old('id_licitacion', $contratos->convenio->id_licitacion) }}" autofocus>
                                    @if ($errors->has('id_licitacion'))
                                        <span class="error text-danger" for="input-id_licitacion">{{$errors -> first('id_licitacion')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="convenio" class="col-sm-2 col-form-label">Convenio</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="convenio" value="{{ old('convenio', $contratos->convenio->convenio) }}">
                                    @if ($errors->has('convenio'))
                                        <span class="error text-danger" for="input-convenio">{{$errors -> first('convenio')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="rut_proveedor" class="col-sm-2 col-form-label">Proveedor</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="rut_proveedor">
                                        @foreach ( $proveedor as $rut )
                                            <option value="{{ $rut->id }}" {{$contratos->convenio->rut_proveedor == $rut->id ? 'selected' : ''}}>{{$rut->nombre_proveedor}}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="rut" class="col-sm-2 col-form-label">Proveedor</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="rut">
                                        @foreach ( $referente as $rut )
                                            <option value="{{ $rut->id }}" {{$contratos->convenio->rut == $rut->id ? 'selected' : ''}}>{{$rut->name}}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="vigencia_inicio" class="col-sm-2 col-form-label">Vigencia Inicio</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="vigencia_inicio" value="{{ old('vigencia_inicio', $contratos->convenio->vigencia_inicio) }}" >
                                    @if ($errors->has('vigencia_inicio'))
                                        <span class="error text-danger" for="input-vigencia_inicio">{{$errors -> first('vigencia_inicio')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="vigencia_fin" class="col-sm-2 col-form-label">Vigencia Fin</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="vigencia_fin" value="{{ old('vigencia_fin', $contratos->convenio->vigencia_fin) }}" >
                                    @if ($errors->has('vigencia_fin'))
                                        <span class="error text-danger" for="input-vigencia_fin">{{$errors -> first('vigencia_fin')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="monto" class="col-sm-2 col-form-label">Monto</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="monto" value="{{ old('monto', $contratos->convenio->monto) }}" >
                                    @if ($errors->has('monto'))
                                        <span class="error text-danger" for="input-monto">{{$errors -> first('monto')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="admin" class="col-sm-2 col-form-label">Gestor de Contrato</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="admin">
                                          @foreach ( $admin as $rut )
                                            <option value="{{ $rut->name }}" {{$contratos->rut == $rut->id ? 'selected' : ''}}>{{$rut->name}}</option>
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
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_tipo_boleta">
                                          @foreach ( $tipoboleta as $boletas )
                                            <option value="{{ $boletas->id }}" {{$contratos->montoboleta->id_tipo_boleta == $boletas->id ? 'selected' : ''}}>{{$boletas->documentos_garantia}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_modalidad" class="col-sm-2 col-form-label">ID Modalidad</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
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
