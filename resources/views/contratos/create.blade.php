@extends('layouts.main', ['activePage' => 'contratos', 'titlePage' => 'Nuevo Contratos'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('direccion.store')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-tittle">Crear Contrato</h4>
                            <p class="card-category">Ingresar datos</p>
                        </div>
                        {{ $errors }}
                        <div class="card-body">
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
                                <label for="res_aprueba_contrato" class="col-sm-2 col-form-label">Resolucion Aprueba Contrato</label>
                                <div class="col-sm-7">
                                    <input type="txt" class="form-control" name="res_adjudicacion" placeholder="Ingrese la resolucion de aprueba contrato" value="{{old('res_aprueba_contrato')}}">
                                    @if ($errors->has('res_aprueba_contrato'))
                                        <span class="error text-danger" for="input-res_aprueba_contrato">{{$errors -> first('res_aprueba_contrato')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_monto" class="col-sm-2 col-form-label">ID Monto</label>
                                <div class="col-sm-7">
                                    <input type="txt" class="form-control" name="id_monto" placeholder="ingrese el id del monto">
                                    @if ($errors->has('id_monto'))
                                        <span class="error text-danger" for="input-id_monto">{{$errors -> first('id_monto')}}</span>
                                    @endif
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
