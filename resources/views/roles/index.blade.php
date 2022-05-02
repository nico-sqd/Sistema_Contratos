@extends('layouts.main', ['activePage' => 'roles', 'titlePage' => 'Roles'])
@section('content')
    <div class="content">
        <div class="container-fuid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-tittle">Roles</h4>
                                    <p class="card-category">Roles Registrados</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            @can('role_create')
                                            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-facebook">Añadir Nuevo Rol</a>
                                            @endcan
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Guard</th>
                                                <th>Fecha de Creación</th>
                                                <th>Permisos</th>
                                                <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                                @forelse ($roles as $role)
                                                <tr>
                                                    <td>{{ $role->id }}</td>
                                                    <td>{{ $role->name }}</td>
                                                    <td>{{ $role->guard_name }}</td>
                                                    <td calss="text-primary">{{ $role->created_at->toFormattedDateString() }}</td>
                                                    <td>
                                                        @forelse ($role->permissions as $permission)
                                                            <span class="badge badge-info">{{ $permission->name }}</span>
                                                        @empty
                                                        <span class="badge badge-danger">No permission added</span>
                                                        @endforelse
                                                    </td>
                                                     <td class="td-actions text-right">
                                                        @can('role_show')
                                                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                                                        @endcan
                                                        @can('role_edit')
                                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                        @endcan
                                                        @can('role_destroy')
                                                        <form action="{{route('roles.destroy', $role->id)}}" method="post" style="display: inline-block" onsubmit="return confirm('¿Estás seguro?')">
                                                        @endcan
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit" rel="tooltip">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @empty
                                                No roles registered yet.
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--footer-->
                                <div class="card-footer ml-auto mr-auto">
                                    {{ $roles ?? ''->links() }}
                                </div>
                                <!--End footer-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
