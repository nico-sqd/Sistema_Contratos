@extends('layouts.main', ['activePage' => 'contratos', 'titlePage' => 'Nuevo Contratos'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('contratos.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-tittle">Crear Contrato</h4>
                            <p class="card-category">Ingresar datos</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ url()->previous() }}" class="btn btn-facebook"><i class="material-icons">arrow_back</i></a>
                                </div>
                            </div>
                            <div class="row">
                            <label for="id_licitacion" class="col-sm-2 col-form-label">ID Licitacion</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="id_licitacion" placeholder="id_licitacion" value="{{old('id_licitacion')}}" autofocus required oninvalid="this.setCustomValidity('Ingrese ID de licitación')" oninput="this.setCustomValidity('')"/>
                                    @if ($errors->has('id_licitacion'))
                                        <span class="error text-danger" for="input-id_licitacion">{{$errors -> first('id_licitacion')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="convenio" class="col-sm-2 col-form-label">Nombre Convenio</label>
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
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="rut_proveedor">
                                        @foreach ( $proveedor as $proveedores )
                                            <option value="{{ $proveedores->id }}">{{ $proveedores->nombre_proveedor }} - {{ $proveedores->rut_proveedor }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="rut" class="col-sm-2 col-form-label">Referentes</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="rut">
                                        @foreach ( $referente as $rut )
                                            <option value="{{ $rut->id }}">{{ $rut->name }} - {{ $rut->rut }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="vigencia_inicio" class="col-sm-2 col-form-label">Vigencia Inicio</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" name="vigencia_inicio">
                                </div>
                            </div>
                            <div class="row">
                                <label for="vigencia_fin" class="col-sm-2 col-form-label">Vigencia Fin</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" name="vigencia_fin">
                                </div>
                            </div>
                            <div class="row">
                                <label for="admin" class="col-sm-2 col-form-label">Gestor de Contrato</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="admin">
                                        @foreach ( $admin as $rut )
                                            <option value="{{ $rut->name }}">{{ $rut->name }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_contrato" class="col-sm-2 col-form-label">ID Contrato</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="id_contrato" placeholder="Ingrese id de contrato" value="{{old('id_contrato')}}" autofocus>
                                    @if ($errors->has('id_contrato'))
                                        <span class="error text-danger" for="input-id_contrato">{{$errors -> first('id_contrato')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="res_adjudicacion" class="col-sm-2 col-form-label">Resolucion de Adjudicacion</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="res_adjudicacion" placeholder="Ingrese la resolucion adjudicacion" value="{{old('res_adjudicacion')}}" required oninvalid="this.setCustomValidity('Ingrese resolución de adjudicación')" oninput="this.setCustomValidity('')"/>
                                    @if ($errors->has('res_adjudicacion'))
                                        <span class="error text-danger" for="input-res_adjudicacion">{{$errors -> first('res_adjudicacion')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="res_apruebacontrato" class="col-sm-2 col-form-label">Resolucion Aprueba Contrato</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="res_apruebacontrato" placeholder="Ingrese la resolucion apruebo" value="{{old('res_apruebacontrato')}}" required oninvalid="this.setCustomValidity('Ingrese resolución de apruebo de contrato')" oninput="this.setCustomValidity('')"/>
                                    @if ($errors->has('res_apruebacontrato'))
                                        <span class="error text-danger" for="input-res_apruebacontrato">{{$errors -> first('res_apruebacontrato')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="moneda" class="col-sm-2 col-form-label">Monto De Contrato</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="moneda" placeholder="Ingrese monto del contrato">
                                    @if ($errors->has('moneda'))
                                        <span class="error text-danger" for="input-moneda">{{$errors -> first('moneda')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_tipo_moneda" class="col-sm-2 col-form-label">Tipo Moneda</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_tipo_moneda">
                                        @foreach ( $tipomoneda as $monedas )
                                            <option value="{{ $monedas->id }}">{{ $monedas->Nombre_tipo }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_tipo_boleta" class="col-sm-2 col-form-label">Documento Garantía</label>
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
                                <label for="institucion" class="col-sm-2 col-form-label">Institución Financiera</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="institucion" placeholder="Institución financiera" value="{{old('institucion')}}" autofocus>
                                    @if ($errors->has('institucion'))
                                        <span class="error text-danger" for="input-institucion">{{$errors -> first('institucion')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="id_boleta" class="col-sm-2 col-form-label">N° Documento</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="id_boleta" placeholder="Ingrese ID de la boleta de garantia" value="{{old('id_boleta')}}" autofocus>
                                    @if ($errors->has('id_boleta'))
                                        <span class="error text-danger" for="input-id_boleta">{{$errors -> first('id_boleta')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="monto_boleta" class="col-sm-2 col-form-label">Monto Boleta Garantía</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="monto_boleta" placeholder="Ingrese monto de la boleta de garantia" value="{{old('monto_boleta')}}" autofocus>
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
                            <div class="row">
                                <label for="id_modalidad" class="col-sm-2 col-form-label">Modalidad</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_modalidad">
                                        @foreach ( $modalidad as $modalidades )
                                            <option value="{{ $modalidades->id }}">{{ $modalidades->nombre_modalidad }} - {{ $modalidades->abreviacion_modalidad }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
                                <div class="col-sm-7" >
                                    <div class="form-group">
                                        <textarea class="form-control" id="descripcion" name= "descripcion" rows="2" cols="107" placeholder="Descripción"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="estado_contrato" class="col-sm-2 col-form-label">Estado Contrato</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="estado_contrato">
                                        @foreach ( $estadocontrato as $estado )
                                            <option value="{{ $estado->id }}">{{ $estado->estado_contrato }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                        {{--<div class="row">
                                <label for="res_aumento" class="col-sm-2 col-form-label">Documento</label>
                                <div class="col-sm-7">
                                    @csrf
                                    <input type="file" name="nombre_archivo" id=""">
                                </div>
                            </div>--}}
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
