@extends('layouts.main', ['activePage' => 'contratos', 'titlePage' => 'Aumento de Contratos'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('contratos.aumento.store', $contratos->id)}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-tittle">Modificaciones Contratos</h4>
                            <p class="card-category">Modificar datos</p>
                        </div>
                        <div class="card-body">
                        <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ url()->previous() }}" class="btn btn-facebook"><i class="material-icons">arrow_back</i></a>
                                </div>
                            </div>
<<<<<<< HEAD
                            <form action="{{route('contratos.update', $contratos->id)}}" method="post" class="form-horizontal">
                                @csrf
                                <div class="row">
                                    <label for="monto_aumento" class="col-sm-2 col-form-label">Monto Aumento</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="monto_aumento" placeholder="Monto Aumento" value="{{old('monto_aumento')}}" autofocus>
                                        @if ($errors->has('monto_aumento'))
                                            <span class="error text-danger" for="input-monto_aumento">{{$errors -> first('monto_aumento')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="res_aumento" class="col-sm-2 col-form-label">Resolución Aumento</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="res_aumento" placeholder="Resolución" value="{{old('res_aumento')}}" autofocus>
                                        @if ($errors->has('res_aumento'))
                                            <span class="error text-danger" for="input-res_aumento">{{$errors -> first('res_aumento')}}</span>
                                        @endif
                                    </div>
=======
                            <div class="row">
                                <label for="res_aumento" class="col-sm-2 col-form-label">Resolución Aumento</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="res_aumento" placeholder="Resolución" value="{{old('res_aumento')}}" autofocus  required oninvalid="this.setCustomValidity('Ingrese ID de resolución')" oninput="this.setCustomValidity('')"/>
                                    @if ($errors->has('res_aumento'))
                                        <span class="error text-danger" for="input-res_aumento">{{$errors -> first('res_aumento')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="monto_aumento" class="col-sm-2 col-form-label">Monto Aumento</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="monto_aumento" placeholder="Monto Aumento" value="{{old('monto_aumento')}}">
                                    @if ($errors->has('monto_aumento'))
                                        <span class="error text-danger" for="input-monto_aumento">{{$errors -> first('monto_aumento')}}</span>
                                    @endif
>>>>>>> refs/remotes/origin/contratos
                                </div>
                            </form>
                            <div class="row">
                                <label for="monto_boleta" class="col-sm-2 col-form-label">Monto Boleta Garantía</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="monto_boleta" placeholder="Monto boleta Garantía" value="{{old('monto_boleta')}}">
                                    @if ($errors->has('monto_boleta'))
                                        <span class="error text-danger" for="input-monto_boleta">{{$errors -> first('monto_boleta')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_moneda" class="col-sm-2 col-form-label">Tipo Moneda Boleta Garantía</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_moneda">
                                        @foreach ( $tipomoneda as $monedas )
                                            <option value="{{ $monedas->id }}">{{ $monedas->Nombre_tipo }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_boleta" class="col-sm-2 col-form-label">ID Boleta Garantía</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="id_boleta" placeholder="ID Boleta Garantía" value="{{old('id_boleta')}}">
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
                                        @foreach ( $tipoboleta as $boletagarantia )
                                            <option value="{{ $boletagarantia->id }}">{{ $boletagarantia->documentos_garantia }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
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
