@extends('layouts.main', ['activePage' => 'establecimiento', 'titlePage' => 'Establecimiento'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('establecimiento.store')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-tittle">Crear Establecimiento</h4>
                            <p class="card-category">Ingresar datos</p>
                        </div>
                        {{ $errors }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ url()->previous() }}" class="btn btn-facebook"><i class="material-icons">arrow_back</i></a>
                                </div>
                            </div>
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
                                <label for="name" class="col-sm-2 col-form-label">Establecimiento</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="establecimiento" placeholder="Ingrese el nombre" value="{{old('establecimiento')}}" autofocus>
                                    @if ($errors->has('establecimiento'))
                                        <span class="error text-danger" for="input-establecimiento">{{$errors -> first('establecimiento')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="rut" class="col-sm-2 col-form-label">Codigo DEIS</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="codigo_deis" placeholder="Ingrese codigo deis" value="{{old('codigo_deis')}}">
                                    @if ($errors->has('codigo_deis'))
                                        <span class="error text-danger" for="input-codigo_deis">{{$errors -> first('codigo_deis')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="rut" class="col-sm-2 col-form-label">Abreviacion</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="abreviacion" placeholder="Ingrese la abreviacion" value="{{old('abreviacion')}}">
                                    @if ($errors->has('abreviacion'))
                                        <span class="error text-danger" for="input-abreviacion">{{$errors -> first('abreviacion')}}</span>
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
