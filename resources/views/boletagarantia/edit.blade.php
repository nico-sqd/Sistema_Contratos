@extends('layouts.main', ['activePage' => 'contratos', 'titlePage' => 'Editar Documento de Garantía'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('contratos.boletagarantia.update', [$contratos, $boleta->id])}}" method="post" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-tittle">contratos</h4>
                            <p class="card-category">Editar datos</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ url()->previous() }}" class="btn btn-facebook"><i class="material-icons">arrow_back</i></a>
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_tipo_boleta" class="col-sm-2 col-form-label">Tipo Documento</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_tipo_boleta">
                                          @foreach ( $tipoboleta as $boletas )
                                            <option value="{{ $boletas->id }}" {{$boleta->id_tipo_boleta == $boletas->id ? 'selected' : ''}}>{{$boletas->documentos_garantia}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="otraboleta" class="col-sm-2 col-form-label">Otro Tipo Documento</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="otraboleta" value="{{ old('otraboleta', $boleta->otraboleta) }}" >
                                    @if ($errors->has('otraboleta'))
                                        <span class="error text-danger" for="input-otraboleta">{{$errors -> first('otraboleta')}}</span>
                                    @endif
                                </div>
                            </div>
                            <script
                                src="https://code.jquery.com/jquery-3.6.0.min.js"
                                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
                            </script>
                            <script>
                            $(document).ready(function() {
                                $('#id_tipo_boleta').change(function(e) {
                                    if ($(this).val() !== "5") {
                                        $('#otraboleta').prop("disabled", true);
                                    } else {
                                        $('#otraboleta').prop("disabled", false);
                                    }
                                    if ($(this).val() === "1") {
                                        $
                                    }
                                })
                            });
                            </script>
                            <div class="row">
                                <label for="institucion" class="col-sm-2 col-form-label">Institución</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="institucion" value="{{ old('institucion', $boleta->institucion) }}" >
                                    @if ($errors->has('institucion'))
                                        <span class="error text-danger" for="input-institucion">{{$errors -> first('institucion')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_boleta" class="col-sm-2 col-form-label">N° Documento</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="id_boleta" value="{{ old('id_boleta', $boleta->id_boleta) }}" >
                                    @if ($errors->has('id_boleta'))
                                        <span class="error text-danger" for="input-id_boleta">{{$errors -> first('id_boleta')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="monto_boleta" class="col-sm-2 col-form-label">Monto Documento Garantía</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="monto_boleta" value="{{ old('monto_boleta', $boleta->monto_boleta) }}" >
                                    @if ($errors->has('monto_boleta'))
                                        <span class="error text-danger" for="input-monto_boleta">{{$errors -> first('monto_boleta')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_moneda" class="col-sm-2 col-form-label">Tipo Moneda</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_moneda">
                                        @foreach ( $tipomoneda as $tipo )
                                            <option value="{{ $tipo->id}}" {{$boleta->id_moneda == $tipo->id ? 'selected' : ''}}>{{$tipo->Nombre_tipo}}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="fecha_vencimiento" class="col-sm-2 col-form-label">Vigencia Vencimiento</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" name="fecha_vencimiento" value="{{ old('fecha_vencimiento', $boleta->fecha_vencimiento) }}">
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
