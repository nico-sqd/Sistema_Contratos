@extends('layouts.main', ['activePage' => 'caratulas', 'titlePage' => 'Editar Caratula'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{dd($caratulas->id);}}
                <form action="{{route('caratula.update', $caratulas->id)}}" method="post" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-tittle">Caratulas</h4>
                            <p class="card-category">Editar datos</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ url()->previous() }}" class="btn btn-facebook"><i class="material-icons">arrow_back</i></a>
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_licitacion" class="col-sm-2 col-form-label">Nombre Licitacion</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="id_licitacion" value="{{ old('id_licitacion', $caratulas->convenio->convenio) }}" autofocus>
                                    @if ($errors->has('id_licitacion'))
                                        <span class="error text-danger" for="input-id_licitacion">{{$errors -> first('id_licitacion')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="nombre_modalidad" class="col-sm-2 col-form-label">Modalidad</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Seleccionar Modalidad</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="nombre_modalidad">
                                            <option value="{{ old('nombre_modalidad', $caratulas->contrato->modalidad->id) }}">{{ $caratulas->contrato->modalidad->nombre_modalidad }}</option>
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_licitacion" class="col-sm-2 col-form-label">ID Licitacion</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="id_licitacion" value="{{ old('id_licitacion', $caratulas->convenio->id_licitacion) }}" >
                                    @if ($errors->has('id_licitacion'))
                                        <span class="error text-danger" for="input-id_licitacion">{{$errors -> first('id_licitacion')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="vigencia_inicio" class="col-sm-2 col-form-label">Vigencia Inicio</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="vigencia_inicio" value="{{ old('vigencia_inicio', $caratulas->convenio->vigencia_inicio) }}" >
                                    @if ($errors->has('vigencia_inicio'))
                                        <span class="error text-danger" for="input-vigencia_inicio">{{$errors -> first('vigencia_inicio')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="vigencia_fin" class="col-sm-2 col-form-label">Vigencia Fin</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="vigencia_fin" value="{{ old('vigencia_fin', $caratulas->convenio->vigencia_fin) }}" >
                                    @if ($errors->has('vigencia_fin'))
                                        <span class="error text-danger" for="input-vigencia_fin">{{$errors -> first('vigencia_fin')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="res_adjudicacion" class="col-sm-2 col-form-label">Res. Adjudicacion</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="res_adjudicacion" value="{{ old('res_adjudicacion', $caratulas->contrato->res_adjudicacion) }}" >
                                    @if ($errors->has('res_adjudicacion'))
                                        <span class="error text-danger" for="input-res_adjudicacion">{{$errors -> first('res_adjudicacion')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="res_apruebacontrato" class="col-sm-2 col-form-label">Res. Aprueba Contrato</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="res_apruebacontrato" value="{{ old('res_apruebacontrato', $caratulas->contrato->res_apruebacontrato) }}" >
                                    @if ($errors->has('res_apruebacontrato'))
                                        <span class="error text-danger" for="input-res_apruebacontrato">{{$errors -> first('res_apruebacontrato')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="moneda" class="col-sm-2 col-form-label">Monto $</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="moneda" value="{{ old('moneda', $caratulas->contrato->monto->moneda) }}" >
                                    @if ($errors->has('moneda'))
                                        <span class="error text-danger" for="input-moneda">{{$errors -> first('moneda')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="monto_boleta" class="col-sm-2 col-form-label">Boleta de Garantía</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="monto_boleta" value="{{ old('monto_boleta', $caratulas->contrato->montoboleta->monto_boleta) }}" >
                                    @if ($errors->has('monto_boleta'))
                                        <span class="error text-danger" for="input-monto_boleta">{{$errors -> first('monto_boleta')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_contrato" class="col-sm-2 col-form-label">ID Contrato</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="id_contrato" value="{{ old('id_contrato', $caratulas->contrato->id_contrato) }}" >
                                    @if ($errors->has('id_contrato'))
                                        <span class="error text-danger" for="input-id_contrato">{{$errors -> first('id_contrato')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="nombre_proveedor" class="col-sm-2 col-form-label">Proveedor</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="nombre_proveedor" value="{{ old('nombre_proveedor', $caratulas->proveedor->nombre_proveedor) }}" >
                                    @if ($errors->has('nombre_proveedor'))
                                        <span class="error text-danger" for="input-nombre_proveedor">{{$errors -> first('nombre_proveedor')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="rut_proveedor" class="col-sm-2 col-form-label">Rut del Proveedor</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="rut_proveedor" value="{{ old('rut_proveedor', $caratulas->proveedor->rut_proveedor) }}" >
                                    @if ($errors->has('rut_proveedor'))
                                        <span class="error text-danger" for="input-rut_proveedor">{{$errors -> first('rut_proveedor')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Referente</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $caratulas->convenio->user->name) }}" >
                                    @if ($errors->has('name'))
                                        <span class="error text-danger" for="input-name">{{$errors -> first('name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="aumento_contrato" class="col-sm-2 col-form-label">Aumento de Contrato</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="aumento_contrato" value="{{ old('aumento_contrato', $caratulas->contrato->aumento_contrato) }}" >
                                    @if ($errors->has('aumento_contrato'))
                                        <span class="error text-danger" for="input-aumento_contrato">{{$errors -> first('aumento_contrato')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="res_aumento" class="col-sm-2 col-form-label">Res. de Aumento de Contrato</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="res_aumento" value="{{ old('res_aumento', $caratulas->contrato->res_aumento) }}" >
                                    @if ($errors->has('res_aumento'))
                                        <span class="error text-danger" for="input-res_aumento">{{$errors -> first('res_aumento')}}</span>
                                    @endif
                                </div>
                            </div>
                            {{--
                            <div class="row">
                                <label for="rol" class="col-sm-2 col-form-label">Rol</label>
                                <div class="col-sm-7">
                                <div class="form-group">
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <table class="table">
                                                    <tbody>
                                                        @foreach($roles as $id => $role)
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" name="roles[]"
                                                                            value="{{ $id }}" {{ $user->roles->contains($id) ? 'checked' : '' }}>
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                {{ $role }}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>--}}
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
