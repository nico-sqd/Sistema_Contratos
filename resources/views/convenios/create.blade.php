@extends('layouts.main', ['activePage' => 'convenios', 'titlePage' => 'Convenios'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('convenios.store')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-tittle">Crear Convenio</h4>
                            <p class="card-category">Ingresar datos</p>
                        </div>
                        {{ $errors }}
                        <div class="card-body">
                          {{--  @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif--}}
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
                                        <label for="exampleFormControlSelect1">Seleccionar Proveedor</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="rut_proveedor">
                                        @foreach ( $proveedor as $proveedores )
                                            <option value="{{ $proveedores->id }}">{{ $proveedores->nombre_proveedor }} - {{ $proveedores->rut_proveedor }}</option>
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
                            </div>
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
                                <label for="admin" class="col-sm-2 col-form-label">Administrador</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="admin" placeholder="Ingrese nombre admin" value="{{old('admin')}}">
                                    @if ($errors->has('admin'))
                                        <span class="error text-danger" for="input-admin">{{$errors -> first('admin')}}</span>
                                    @endif
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
