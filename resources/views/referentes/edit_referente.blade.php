@extends('layouts.main', ['activePage' => 'referentes', 'titlePage' => 'Editar Usuario'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('referentes.update_referente', $user->id)}}" method="post" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-tittle">Usuario</h4>
                            <p class="card-category">Editar datos</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ url()->previous() }}" class="btn btn-facebook"><i class="material-icons">arrow_back</i></a>
                                </div>
                            </div>
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" autofocus>
                                    @if ($errors->has('name'))
                                        <span class="error text-danger" for="input-name">{{$errors -> first('name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="rut" class="col-sm-2 col-form-label">RUT</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="rut" value="{{ old('rut', $user->rut) }}">
                                    @if ($errors->has('rut'))
                                        <span class="error text-danger" for="input-rut">{{$errors -> first('rut')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="email" class="col-sm-2 col-form-label">Correo</label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" >
                                    @if ($errors->has('email'))
                                        <span class="error text-danger" for="input-email">{{$errors -> first('email')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="password" placeholder="Ingresar contraseña solo en caso de editar..." >
                                    @if ($errors->has('password'))
                                        <span class="error text-danger" for="input-password">{{$errors -> first('password')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="subrogante" class="col-sm-2 col-form-label">Nombre Subrogante</label>
                                <div class="col-sm-7">
                                    <input type="subrogante" class="form-control" name="subrogante" value="{{ old('subrogante', $user->subrogante) }}" >
                                    @if ($errors->has('subrogante'))
                                        <span class="error text-danger" for="input-subrogante">{{$errors -> first('subrogante')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="correo_subrogante" class="col-sm-2 col-form-label">Correo Subrogante</label>
                                <div class="col-sm-7">
                                    <input type="correo_subrogante" class="form-control" name="correo_subrogante" value="{{ old('correo_subrogante', $user->correo_subrogante) }}" >
                                    @if ($errors->has('correo_subrogante'))
                                        <span class="error text-danger" for="input-correo_subrogante">{{$errors -> first('correo_subrogante')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="rol" class="col-sm-2 col-form-label">Establecimiento</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Seleccionar Establecimiento</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="establecimiento">
                                          @foreach ( $establecimientos as $establecimiento )
                                            <option value="{{ $establecimiento->id }}" {{ $user->establecimiento == $establecimiento->id ? 'selected' : '' }}>{{ $establecimiento->establecimiento }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="rol" class="col-sm-2 col-form-label">Subdireccion</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Seleccionar Subdireccion</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_subdireccion">
                                          @foreach ( $subdirecciones as $subdireccion )
                                            <option value="{{ $subdireccion->id }}" {{ $user->id_subdireccion == $subdireccion->id ? 'selected' : '' }}>{{ $subdireccion->nombre_subdireccion }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="rol" class="col-sm-2 col-form-label">Departamento</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Seleccionar Departamento</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="id_departamento">
                                          @foreach ( $departamentos as $departamento )
                                            <option value="{{ $departamento->id }}" {{ $user->id_departamento == $departamento->id ? 'selected' : '' }}>{{ $departamento->nombre_departamento }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="rol" class="col-sm-2 col-form-label">Rol</label>
                                <div class="col-sm-7">
                                <div class="form-group">
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <table class="table">
                                                    <tbody>
                                                        @foreach($roles as $id => $role)
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" name="roles[]"
                                                                            value="{{ $id }}" {{ $user->roles->contains($id) ? 'checked' : '' }}>
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                {{ $role }}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
