@extends('layouts.main', ['activePage' => 'convenios', 'titlePage' => 'Editar Convenio'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('convenios.update', $convenios->id)}}" method="post" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-tittle">Convenio</h4>
                            <p class="card-category">Editar datos</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label for="id_licitacion" class="col-sm-2 col-form-label">ID Licitacion</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="id_licitacion" value="{{ old('id_licitacion', $convenios->id_licitacion) }}" autofocus>
                                    @if ($errors->has('id_licitacion'))
                                        <span class="error text-danger" for="input-id_licitacion">{{$errors -> first('id_licitacion')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="convenio" class="col-sm-2 col-form-label">Convenio</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="convenio" value="{{ old('convenio', $convenios->convenio) }}">
                                    @if ($errors->has('convenio'))
                                        <span class="error text-danger" for="input-convenio">{{$errors -> first('convenio')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="rut_proveedor" class="col-sm-2 col-form-label">RUT Proveedor</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="rut_proveedor" value="{{ old('rut_proveedor', $convenios->proveedor->rut_proveedor) }}" >
                                    @if ($errors->has('rut_proveedor'))
                                        <span class="error text-danger" for="input-rut_proveedor">{{$errors -> first('rut_proveedor')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="vigencia_inicio" class="col-sm-2 col-form-label">Vigencia Inicio</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="vigencia_inicio" value="{{ old('vigencia_inicio', $convenios->vigencia_inicio) }}" >
                                    @if ($errors->has('vigencia_inicio'))
                                        <span class="error text-danger" for="input-vigencia_inicio">{{$errors -> first('vigencia_inicio')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="vigencia_fin" class="col-sm-2 col-form-label">Vigencia Fin</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="vigencia_fin" value="{{ old('vigencia_fin', $convenios->vigencia_fin) }}" >
                                    @if ($errors->has('vigencia_fin'))
                                        <span class="error text-danger" for="input-vigencia_fin">{{$errors -> first('vigencia_fin')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="monto" class="col-sm-2 col-form-label">Monto</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="monto" value="{{ old('monto', $convenios->monto) }}" >
                                    @if ($errors->has('monto'))
                                        <span class="error text-danger" for="input-monto">{{$errors -> first('monto')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="admin" class="col-sm-2 col-form-label">Administrador</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="admin" value="{{ old('admin', $convenios->admin) }}" >
                                    @if ($errors->has('admin'))
                                        <span class="error text-danger" for="input-admin">{{$errors -> first('admin')}}</span>
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
