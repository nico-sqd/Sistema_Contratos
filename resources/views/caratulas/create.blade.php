@extends('layouts.main', ['activePage' => 'contratos', 'titlePage' => 'Nuevo Contratos'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('caratula.store')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-tittle">Crear Caratula</h4>
                            <p class="card-category">Ingresar datos</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ url()->previous() }}" class="btn btn-facebook"><i class="material-icons">arrow_back</i></a>
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_proveedor" class="col-sm-2 col-form-label">Proveedor</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Seleccionar un Proveedor</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_proveedor">
                                        @foreach ( $proveedores as $proveedor )
                                            <option value="{{ $proveedor->id }}">{{ $proveedor->nombre_proveedor }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_convenio" class="col-sm-2 col-form-label">Convenio</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Seleccionar un Convenio</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_convenio">
                                        @foreach ( $convenios as $convenio )
                                            <option value="{{ $convenio->id }}">{{ $convenio->convenio }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_contrato" class="col-sm-2 col-form-label">Contratos</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Seleccionar un Contrato</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_contrato">
                                        @foreach ( $contratos as $contrato )
                                            <option value="{{ $contrato->id }}">{{ $contrato->id_contrato }}</option>
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
