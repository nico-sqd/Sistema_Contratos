@extends('layouts.main', ['activePage' => 'proveedores', 'titlePage' => 'Nuevo Proveedor'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('direccion.store')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-tittle">Crear Proveedor</h4>
                            <p class="card-category">Ingresar datos</p>
                        </div>
                        {{ $errors }}
                        <div class="card-body">
                            <div class="row">
                                <label for="nombre_proveedor" class="col-sm-2 col-form-label">Proveedor</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="nombre_proveedor" placeholder="Ingrese nombre" value="{{old('nombre_proveedor')}}" autofocus>
                                    @if ($errors->has('nombre_proveedor'))
                                        <span class="error text-danger" for="input-nombre_proveedor">{{$errors -> first('nombre_proveedor')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="rut_proveedor" class="col-sm-2 col-form-label">RUT Proveedor</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="rut_proveedor" placeholder="Ingrese el RUT" value="{{old('rut_proveedor')}}">
                                    @if ($errors->has('rut_proveedor'))
                                        <span class="error text-danger" for="input-rut_proveedor">{{$errors -> first('rut_proveedor')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="representante" class="col-sm-2 col-form-label">Representante Legal</label>
                                <div class="col-sm-7">
                                    <input type="representante" class="form-control" name="representante" placeholder="Ingrese nombre" value="{{old('representante')}}">
                                    @if ($errors->has('representante'))
                                        <span class="error text-danger" for="input-representante">{{$errors -> first('representante')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="rut_representante" class="col-sm-2 col-form-label">RUN Representante</label>
                                <div class="col-sm-7">
                                    <input type="rut_representante" class="form-control" name="rut_representante" placeholder="Ingrese RUN">
                                    @if ($errors->has('rut_representante'))
                                        <span class="error text-danger" for="input-rut_representante">{{$errors -> first('rut_representante')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="direccion" class="col-sm-2 col-form-label">Direccion</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="direccion" placeholder="Ingrese nombre" value="{{old('direccion')}}" autofocus>
                                    @if ($errors->has('direccion'))
                                        <span class="error text-danger" for="input-direccion">{{$errors -> first('direccion')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="comuna" class="col-sm-2 col-form-label">Comuna</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="comuna" placeholder="Ingrese nombre" value="{{old('comuna')}}" autofocus>
                                    @if ($errors->has('comuna'))
                                        <span class="error text-danger" for="input-comuna">{{$errors -> first('comuna')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="region" class="col-sm-2 col-form-label">Region</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="region" placeholder="Ingrese nombre" value="{{old('region')}}" autofocus>
                                    @if ($errors->has('region'))
                                        <span class="error text-danger" for="input-region">{{$errors -> first('region')}}</span>
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
