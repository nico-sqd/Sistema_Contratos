@extends('layouts.main', ['activePage' => 'contratos', 'titlePage' => 'Nuevo Contratos'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('contratos.store')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-tittle">Crear Contrato</h4>
                            <p class="card-category">Ingresar datos</p>
                        </div>
                        {{ $errors }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ url()->previous() }}" class="btn btn-facebook"><i class="material-icons">arrow_back</i></a>
                                </div>
                            </div>
                            <div class="row">
                            <label for="id_licitacion" class="col-sm-2 col-form-label">ID Licitacion</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="id_licitacion" placeholder="id_licitacion" value="{{old('id_licitacion')}}" autofocus>
                                    @if ($errors->has('id_licitacion'))
                                        <span class="error text-danger" for="input-id_licitacion">{{$errors -> first('id_licitacion')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="convenio" class="col-sm-2 col-form-label">convenio</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="convenio" placeholder="Ingrese nombre convenio" value="{{old('convenio')}}">
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
                                        @foreach ( $proveedor as $proveedores )
                                            <option value="{{ $proveedores->id }}">{{ $proveedores->nombre_proveedor }} - {{ $proveedores->rut_proveedor }}</option>
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
                                            <option value="{{ $rut->id }}">{{ $rut->name }} - {{ $rut->rut }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            {{--<div class="row">
                                <label for="rut_proveedor" class="col-sm-2 col-form-label">RUT del Proveedor</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="rut_proveedor" placeholder="Ingrese el RUT Proveedor" value="{{old('rut_proveedor')}}">
                                    @if ($errors->has('rut_proveedor'))
                                        <span class="error text-danger" for="input-rut_proveedor">{{$errors -> first('rut_proveedor')}}</span>
                                    @endif
                                </div>
                            </div>--}}
                            <div class="row">
                                <label for="vigencia_inicio" class="col-sm-2 col-form-label">Vigencia Inicio</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" name="vigencia_inicio">
                                </div>
                            </div>
                            <div class="row">
                                <label for="vigencia_fin" class="col-sm-2 col-form-label">Vigencia Fin</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" name="vigencia_fin">
                                </div>
                            </div>
                            {{--<div class="row">
                                <label for="vigencia_inicio" class="col-sm-2 col-form-label">Vigencia Inicio</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="vigencia_inicio" placeholder="Ingrese vigencia inicio" value="{{old('vigencia_inicio')}}">
                                    @if ($errors->has('vigencia_inicio'))
                                        <span class="error text-danger" for="input-vigencia_inicio">{{$errors -> first('vigencia_inicio')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="vigencia_fin" class="col-sm-2 col-form-label">Vigencia Fin</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="vigencia_fin" placeholder="Ingrese vigencia fin" value="{{old('vigencia_fin')}}">
                                    @if ($errors->has('vigencia_fin'))
                                        <span class="error text-danger" for="input-vigencia_fin">{{$errors -> first('vigencia_fin')}}</span>
                                    @endif
                                </div>
                            </div>--}}
                            <div class="row">
                                <label for="monto" class="col-sm-2 col-form-label">Monto</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="monto" placeholder="Ingrese monto" value="{{old('monto')}}">
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
                                            <option value="{{ $rut->name }}">{{ $rut->name }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_contrato" class="col-sm-2 col-form-label">ID Contrato</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="id_contrato" placeholder="Ingrese id de contrato" value="{{old('id_contrato')}}" autofocus>
                                    @if ($errors->has('id_contrato'))
                                        <span class="error text-danger" for="input-id_contrato">{{$errors -> first('id_contrato')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="res_adjudicacion" class="col-sm-2 col-form-label">Resolucion de Adjudicacion</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="res_adjudicacion" placeholder="Ingrese la resolucion adjudicacion" value="{{old('res_adjudicacion')}}">
                                    @if ($errors->has('res_adjudicacion'))
                                        <span class="error text-danger" for="input-res_adjudicacion">{{$errors -> first('res_adjudicacion')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="res_apruebacontrato" class="col-sm-2 col-form-label">Resolucion Aprueba Contratob</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="res_apruebacontrato" placeholder="Ingrese la resolucion apruebo" value="{{old('res_apruebacontrato')}}">
                                    @if ($errors->has('res_apruebacontrato'))
                                        <span class="error text-danger" for="input-res_apruebacontrato">{{$errors -> first('res_apruebacontrato')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="moneda" class="col-sm-2 col-form-label">Monto</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="moneda" placeholder="ingrese monto">
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
                                        @foreach ( $tipomoneda as $monedas )
                                            <option value="{{ $monedas->id_tipo }}">{{ $monedas->Nombre_tipo }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="monto_boleta" class="col-sm-2 col-form-label">Monto Boleta de Garantía</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="monto_boleta" placeholder="Ingrese el monto boleta garantia" value="{{old('monto_boleta')}}" autofocus>
                                    @if ($errors->has('monto_boleta'))
                                        <span class="error text-danger" for="input-monto_boleta">{{$errors -> first('monto_boleta')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_tipo_boleta" class="col-sm-2 col-form-label">Tipo Boleta</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_tipo_boleta">
                                        @foreach ( $tipoboleta as $boletagarantia )
                                            <option value="{{ $boletagarantia->id }}">{{ $boletagarantia->documentos_garantia }}</option>
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
                                        @foreach ( $modalidad as $modalidades )
                                            <option value="{{ $modalidades->id }}">{{ $modalidades->nombre_modalidad }} - {{ $modalidades->abreviacion_modalidad }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="aumento_contrato" class="col-sm-2 col-form-label">Aumento Contrato</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="aumento_contrato" placeholder="Ingrese el aumento contrato" value="{{old('aumento_contrato')}}" autofocus>
                                    @if ($errors->has('aumento_contrato'))
                                        <span class="error text-danger" for="input-aumento_contrato">{{$errors -> first('aumento_contrato')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="res_aumento" class="col-sm-2 col-form-label">Resolucion de Aumento</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="res_aumento" placeholder="Ingrese resolucion aumento" value="{{old('res_aumento')}}" autofocus>
                                    @if ($errors->has('res_aumento'))
                                        <span class="error text-danger" for="input-comuna">{{$errors -> first('res_aumento')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
                                <div class="col-sm-7" >
                                    <div class="form-group">
                                        <textarea class="form-control" id="descripcion" name= "descripcion" rows="2" cols="107" placeholder="Descripción"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="estado_contrato" class="col-sm-2 col-form-label">Estado Contrato</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="estado_contrato">
                                        @foreach ( $estadocontrato as $estado )
                                            <option value="{{ $estado->id }}">{{ $estado->estado_contrato }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                        <!--footer-->
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                        </div>
                        <!--End footer-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
