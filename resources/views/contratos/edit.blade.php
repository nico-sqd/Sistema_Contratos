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
                                <label for="convenio" class="col-sm-2 col-form-label">Nombre Convenio</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="convenio" value="{{ old('convenio', $contratos->convenio->convenio) }}">
                                    @if ($errors->has('convenio'))
                                        <span class="error text-danger" for="input-convenio">{{$errors -> first('convenio')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="rut_proveedor" class="col-sm-2 col-form-label">Proveedores</label>
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
                                <label for="rut" class="col-sm-2 col-form-label">Referentes</label>
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
                                <label for="vigencia_inicio" class="col-sm-2 col-form-label">Vigencia Inicio </label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" name="vigencia_inicio" value="{{ old('vigencia_inicio', $contratos->convenio->vigencia_inicio) }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="vigencia_fin" class="col-sm-2 col-form-label">Vigencia Fin</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" name="vigencia_fin" value="{{ old('vigencia_fin', $contratos->convenio->vigencia_fin) }}">
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
                                <label for="moneda" class="col-sm-2 col-form-label">Monto de Contrato</label>
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
                                <label for="id_boleta" class="col-sm-2 col-form-label">ID Boleta de Garantía</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="id_boleta" value="{{ old('id_boleta', $contratos->montoboleta->id_boleta) }}" >
                                    @if ($errors->has('id_boleta'))
                                        <span class="error text-danger" for="input-id_boleta">{{$errors -> first('id_boleta')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_tipo_boleta" class="col-sm-2 col-form-label">Tipo Boleta</label>
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
                                <label for="id_modalidad" class="col-sm-2 col-form-label">Modalidad</label>
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
                                <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion', $contratos->descripcion) }}" >
                                    @if ($errors->has('descripcion'))
                                        <span class="error text-danger" for="input-descripcion">{{$errors -> first('descripcion')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="estado_contrato" class="col-sm-2 col-form-label">Estado Contrato</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="estado_contrato">
                                          @foreach ( $estadocontrato as $estado )
                                            <option value="{{ $estado->id }}" {{$contratos->estado_contrato == $estado->id ? 'selected' : ''}}>{{$estado->estado_contrato}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                        <!--footers-->
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
