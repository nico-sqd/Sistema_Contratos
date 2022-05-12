@extends('layouts.main', ['activePage' => 'establecimiento', 'titlePage' => 'Editar Establecimiento'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <form action="{{route('establecimiento.update', ['establecimiento' => $establecimientos->id])}}" method="post" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-tittle">Establecimiento</h4>
                            <p class="card-category">Editar datos</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label for="establecimiento" class="col-sm-2 col-form-label">Establecimiento</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="establecimiento" value="{{ old('establecimiento', $establecimientos->establecimiento) }}" autofocus>
                                    @if ($errors->has('establecimiento'))
                                        <span class="error text-danger" for="input-establecimiento">{{$errors -> first('establecimiento')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="rut" class="col-sm-2 col-form-label">Abreviacion</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="abreviacion" value="{{ old('abreviacion', $establecimientos->abreviacion) }}">
                                    @if ($errors->has('abreviacion'))
                                        <span class="error text-danger" for="input-abreviacion">{{$errors -> first('abreviacion')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="email" class="col-sm-2 col-form-label">Codigo DEIS</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="codigo_deis" value="{{ old('codigo_deis', $establecimientos->codigo_deis) }}" >
                                    @if ($errors->has('codigo_deis'))
                                        <span class="error text-danger" for="input-email">{{$errors -> first('codigo_deis')}}</span>
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
