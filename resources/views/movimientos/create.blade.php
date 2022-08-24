@extends('layouts.main', ['activePage' => 'contratos', 'titlePage' => 'Registrar Movimiento'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('contratos.movimientos.store', $contratos->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-tittle">Ingresar Movimiento</h4>
                            <p class="card-category">Ingresar datos</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ url()->previous() }}" class="btn btn-facebook"><i class="material-icons">arrow_back</i></a>
                                </div>
                            </div>
                            <div class="row">
                            <label for="id_oc" class="col-sm-2 col-form-label">ID Licitacion</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="id_oc" placeholder="id_oc" value="{{old('id_oc')}}" autofocus required oninvalid="this.setCustomValidity('Ingrese ID de licitación')" oninput="this.setCustomValidity('')"/>
                                    @if ($errors->has('id_oc'))
                                        <span class="error text-danger" for="input-id_oc">{{$errors -> first('id_oc')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_unidad" class="col-sm-2 col-form-label">Proveedores</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_unidad">
                                        @foreach ( $unidadesmedidas as $unidades )
                                            <option value="{{ $unidades->id }}">{{ $unidades->unidad }}</option>
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
