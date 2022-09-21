@extends('layouts.main', ['activePage' => 'contratos', 'titlePage' => 'Documentos de Garantía'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('contratos.boletagarantia.store', $contratos->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-tittle">Documentos de Garantía</h4>
                            <p class="card-category">Agregar datos</p>
                        </div>
                        <div class="card-body">
                        <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('contratos.show', $contratos->id) }}" class="btn btn-facebook"><i class="material-icons">arrow_back</i></a>
                                </div>
                            </div>
                            <!-- PREGUNTAR A MANCHAS SOBRE DESABILITAR ESTA SECCION -->
                            <div class="row">
                                <label for="id_tipo_boleta" class="col-sm-2 col-form-label">Tipo Documento</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="id_tipo_boleta" name="id_tipo_boleta">
                                            <option hidden>Seleccione Tipo de Documento</option>
                                        @foreach ( $tipoboleta as $boletagarantia )
                                            <option value="{{ $boletagarantia->id }}">{{ $boletagarantia->documentos_garantia }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="otraboleta" class="col-sm-2 col-form-label">Otro Tipo Documento</label>
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
                                    if ($(this).val() === "1") {
                                        $
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
                                <label for="monto_boleta" class="col-sm-2 col-form-label">Monto Documento Garantía</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="monto_boleta" placeholder="Monto boleta Garantía" value="{{old('monto_boleta')}}">
                                    @if ($errors->has('monto_boleta'))
                                        <span class="error text-danger" for="input-monto_boleta">{{$errors -> first('monto_boleta')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_moneda" class="col-sm-2 col-form-label">Tipo Moneda Documento Garantía</label>
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
                            <button type="submit" class="btn btn-primary">{{ __('Agregar') }}</button>
                        </div>
                        <!--End footer-->
                    </div>
                </form>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                                <th>Documento Garantía</th>
                                <th>Institución</th>
                                <th>N° Documento</th>
                                <th>Monto</th>
                                <th>Fecha Vencimiento</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                            @foreach ($montoboleta as $boleta)
                                @if ($boleta->id_contrato_original == $contratos->id || $boleta->id_contrato_modificada == $contratos->id)
                                <tr>
                                    @if ($boleta->boletagarantia->documentos_garantia == 'Otro')
                                        <td>{{ $boleta->otraboleta }}</td>
                                    @else
                                        <td>{{ $boleta->boletagarantia->documentos_garantia }}</td>
                                    @endif
                                    <td>{{ $boleta->institucion }}</td>
                                    <td>{{ $boleta->id_boleta }}</td>
                                    @if ($boleta->tipomoneda->Nombre_tipo == 'CLP')
                                    <td>$ {{ number_format($boleta->monto_boleta) }} {{$boleta->tipomoneda->Nombre_tipo}}</td>
                                    @endif
                                    @if ($boleta->tipomoneda->Nombre_tipo == 'USD')
                                    <td>$ {{ number_format($boleta->monto_boleta,2,',','.') }} {{$boleta->tipomoneda->Nombre_tipo}}</td>
                                    @endif
                                    @if ($boleta->tipomoneda->Nombre_tipo == 'UF')
                                    <td>$ {{ number_format($boleta->monto_boleta) }} {{$boleta->tipomoneda->Nombre_tipo}}</td>
                                    @endif
                                    <td>{{ $boleta->fecha_vencimiento }}</td>
                                    <td class="td-actions text-center">
                                        @can('admin_edit')
                                            <a href="{{ route('contratos.boletagarantia.edit', [$contratos,$boleta]) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                        @endcan
                                        <a href="{{ route('files.download', $boleta->file->uuid) }}" class="btn btn-info"><i class="material-icons">download</i></a>
                                        @can('admin_destroy')
                                        <form action="{{route('contratos.boletagarantia.destroy', [$contratos,$boleta])}}" method="post" style="display: inline-block" onsubmit="return confirm('¿Estás seguro?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" rel="tooltip">
                                            <i class="material-icons">close</i>
                                        </button>
                                        </form>
                                        @endcan
                                    </form>
                                </td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
