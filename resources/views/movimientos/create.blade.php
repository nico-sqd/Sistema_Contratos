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
                                <label for="id_establecimiento" class="col-sm-2 col-form-label">Establecimientos</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_establecimiento">
                                            <option value="" hidden>Seleccione Establecimiento</option>
                                        @foreach ( $establecimientos as $establecimiento )
                                            <option value="{{ $establecimiento->id }}">{{ $establecimiento->establecimiento }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_dispositivo" class="col-sm-2 col-form-label">Dispositivos</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_dispositivo">
                                            <option value = "" hidden>Seleccione Dispositivo</option>
                                        @foreach ( $dispositivos as $dispositivo )
                                            <option value="{{ $dispositivo->id }}">{{ $dispositivo->nombre_dispositivo }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                            <label for="id_oc" class="col-sm-2 col-form-label">ID Orden de Compra</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="id_oc" id="id_oc" data-toggle="tooltip" title="" data-trigger="" placeholder="id_oc" value="{{old('id_oc')}}" autofocus required oninvalid="this.setCustomValidity('Ingrese ID de Orden de Compra')" oninput="this.setCustomValidity('')"/>
                                    @if ($errors->has('id_oc'))
                                        <span class="error text-danger" for="input-id_oc">{{$errors -> first('id_oc')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_unidad" class="col-sm-2 col-form-label">Unidad de Medida</label>
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
                            <div class="row">
                            <label for="cantidad" class="col-sm-2 col-form-label">Cantidad</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="cantidad" placeholder="cantidad" value="{{old('cantidad')}}" autofocus required oninvalid="this.setCustomValidity('Ingrese cantidad')" oninput="this.setCustomValidity('')"/>
                                    @if ($errors->has('cantidad'))
                                        <span class="error text-danger" for="input-cantidad">{{$errors -> first('cantidad')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                            <label for="valor_unitario" class="col-sm-2 col-form-label">valor_unitario</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="valor_unitario" placeholder="valor_unitario" value="{{old('valor_unitario')}}" autofocus required oninvalid="this.setCustomValidity('Ingrese valor unitario')" oninput="this.setCustomValidity('')"/>
                                    @if ($errors->has('valor_unitario'))
                                        <span class="error text-danger" for="input-valor_unitario">{{$errors -> first('valor_unitario')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="nmr_factura" class="col-sm-2 col-form-label">N° Factura</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="nmr_factura" placeholder="nmr_factura" value="{{old('nmr_factura')}}" autofocus required oninvalid="this.setCustomValidity('Ingrese N° Factura)" oninput="this.setCustomValidity('')"/>
                                        @if ($errors->has('nmr_factura'))
                                            <span class="error text-danger" for="input-nmr_factura">{{$errors -> first('nmr_factura')}}</span>
                                        @endif
                                    </div>
                                </div>
                            <div class="row">
                                <label for="fecha_factura" class="col-sm-2 col-form-label">Fecha Factura</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" name="fecha_factura">
                                </div>
                            </div>
                            <div class="row">
                                <label for="valor_factura" class="col-sm-2 col-form-label">Valor Factura $</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="valor_factura" placeholder="valor_factura" value="{{old('valor_factura')}}" autofocus required oninvalid="this.setCustomValidity('Ingrese N° Factura)" oninput="this.setCustomValidity('')"/>
                                        @if ($errors->has('valor_factura'))
                                            <span class="error text-danger" for="input-valor_factura">{{$errors -> first('valor_factura')}}</span>
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

@push('js')
<script>

    $(function(){
      $("#id_oc").tooltip();
    });
    $("#id_oc").on("change", function(){
         texto = $(this).val();
         $.ajax({
           url: '{{ route('movimiento.buscar') }}',
           data: {
             contrato: {{$contratos->id}},
             oc: texto
           },
           success: function(data) {
             $("#id_oc").tooltip('hide')
            .attr('data-original-title', data.existe.startsWith("t") ? "El ID OC ingresado ya existe" : "El ID OC ingresado no ha sido registrado")
            .tooltip('update')
            .tooltip('show');
           },
           error: function(data) {
             console.log('error');
           }
         });
    });
</script>
@endpush
