@extends('layouts.main', ['activePage' => 'contratos', 'titlePage' => 'Aumento de Contratos'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('contratos.aumento.store', $contratos->id)}}" method="post" class="form-horizontal"  enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-tittle">Modificaciones Contratos</h4>
                            <p class="card-category">Modificar datos</p>
                        </div>
                        <div class="card-body">
                        <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ url()->previous() }}" class="btn btn-facebook"><i class="material-icons">arrow_back</i></a>
                                </div>
                            </div>
                            <div class="row">
                                <label for="res_aumento" class="col-sm-2 col-form-label">Resolución Aumento</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="res_aumento" placeholder="Resolución" value="{{old('res_aumento')}}" autofocus  required oninvalid="this.setCustomValidity('Ingrese ID de resolución')" oninput="this.setCustomValidity('')"/>
                                    @if ($errors->has('res_aumento'))
                                        <span class="error text-danger" for="input-res_aumento">{{$errors -> first('res_aumento')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="monto_aumento" class="col-sm-2 col-form-label">Monto Aumento</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="monto_aumento" placeholder="Monto Aumento" value="{{old('monto_aumento')}}">
                                    @if ($errors->has('monto_aumento'))
                                        <span class="error text-danger" for="input-monto_aumento">{{$errors -> first('monto_aumento')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_tipo_boleta" class="col-sm-2 col-form-label">Tipo Boleta</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="id_tipo_boleta" name="id_tipo_boleta">
                                        @foreach ( $tipoboleta as $boletagarantia )
                                            <option value="{{ $boletagarantia->id }}">{{ $boletagarantia->documentos_garantia }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="otraboleta" class="col-sm-2 col-form-label">Otro Tipo Boleta</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="otraboleta" placeholder="Tipo Boleta" id="otraboleta" value="{{old('otraboleta')}}" required oninvalid="this.setCustomValidity('Ingrese tipo de boleta')" oninput="this.setCustomValidity('')"/>
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
                                })
                            });
                            </script>
                            <div class="row">
                                <label for="institucion" class="col-sm-2 col-form-label">Institución</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="institucion" placeholder="Institución financiera" value="{{old('institucion')}}">
                                    @if ($errors->has('institucion'))
                                        <span class="error text-danger" for="input-institucion">{{$errors -> first('institucion')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_boleta" class="col-sm-2 col-form-label">N° Documento</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="id_boleta" placeholder="ID Boleta Garantía" value="{{old('id_boleta')}}" autofocus required oninvalid="this.setCustomValidity('Ingrese ID de la boleta')" oninput="this.setCustomValidity('')"/>
                                    @if ($errors->has('id_boleta'))
                                        <span class="error text-danger" for="input-id_boleta">{{$errors -> first('id_boleta')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="monto_boleta" class="col-sm-2 col-form-label">Monto Boleta Garantía</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="monto_boleta" placeholder="Monto boleta Garantía" value="{{old('monto_boleta')}}">
                                    @if ($errors->has('monto_boleta'))
                                        <span class="error text-danger" for="input-monto_boleta">{{$errors -> first('monto_boleta')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_moneda" class="col-sm-2 col-form-label">Tipo Moneda Boleta Garantía</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_moneda">
                                        @foreach ( $tipomoneda as $monedas )
                                            <option value="{{ $monedas->id }}">{{ $monedas->Nombre_tipo }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="fecha_vencimiento" class="col-sm-2 col-form-label">Fecha Vencimiento</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" name="fecha_vencimiento">
                                </div>
                            </div>
                            @can('admin_create')
                            <div class="row">
                                <label for="res_aumento" class="col-sm-2 col-form-label">Subir Documento</label>
                                <div class="col-sm-7">
                                    @csrf
                                    <input type="file" name="nombre_archivo" id="" accept="application/pdf, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/msword,image/*" required oninvalid="this.setCustomValidity('Seleccione antes un archivo para subir')" oninput="this.setCustomValidity('')"/>
                                    @if(Session::has('errors'))
                                        <div class="alert alert-danger" style="text-align:center" role="alert">
                                            <h4>{{Session::get('errors')->first()}}</h4>
                                        </div>
                                    @endif
                                    @error('nombre_archivo')
                                        <big class="text-danger">{{session('errors')->first('message1');}}</big>
                                    @enderror
                                </div>
                            </div>
                            @endcan
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
