<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Establecimiento;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Builder;
use App\Models\SubDireccion;
use App\Http\Controllers\auth;
use App\Models\Departamento;
use App\Models\Convenio;

class UserController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('super_index'), 403); //si el usuario no tiene el permiso "user_index" mostrara "error 403"
        $texto = trim($request->get('texto'));
        $users=User::whereRaw('UPPER(name) LIKE ?', ['%' . strtoupper($texto) . '%'])
        ->orWhereRaw('UPPER(email) LIKE ?', ['%' . strtoupper($texto) . '%'])
        ->orWhere('rut', 'LIKE', '%' . $texto . '%')
        ->orWhereHas('getEstablecimiento', function (Builder $query) use ($texto){
            $query->WhereRaw('UPPER(establecimiento) LIKE ?',['%' . strtoupper($texto) . '%']);
        })
        ->orderBy('id','asc')
        ->paginate(5);
        return view('users.index', compact('users'));
    }

    public function index_administrador(Request $request)
    {
        abort_if(Gate::denies('admin_index'), 403);
        $texto = trim($request->get('texto'));
        $users = User::whereRaw('UPPER(name) LIKE ?', ['%' . strtoupper($texto) . '%'])
        ->orWhereRaw('UPPER(email) LIKE ?', ['%' . strtoupper($texto) . '%'])
        ->orWhere('rut', 'LIKE', '%' . $texto . '%')
        ->orWhereHas('getEstablecimiento', function (Builder $query) use ($texto){
            $query->WhereRaw('UPPER(establecimiento) LIKE ?',['%' . strtoupper($texto) . '%']);
        })
        ->orderBy('id','asc')
        ->notRole(['SuperAdmin'])
        ->orDoesntHave('roles')
        ->paginate(5);
        return view('administradores.index_administrador', compact('users'));
    }

    public function index_referente(Request $request)
    {
        abort_if(Gate::denies('index'), 403);
        //$users = User::paginate(5);
        $texto = trim($request->get('texto'));
        $users = User::whereRaw('UPPER(name) LIKE ?', ['%' . strtoupper($texto) . '%'])
        ->orWhereRaw('UPPER(email) LIKE ?', ['%' . strtoupper($texto) . '%'])
        ->orWhere('rut', 'LIKE', '%' . $texto . '%')
        ->orWhereHas('getEstablecimiento', function (Builder $query) use ($texto){
            $query->WhereRaw('UPPER(establecimiento) LIKE ?',['%' . strtoupper($texto) . '%']);
        })
        ->orWhereHas('subdireccion', function (Builder $query) use ($texto){
            $query->WhereRaw('UPPER(nombre_subdireccion) LIKE ?',['%' . strtoupper($texto) . '%']);
        })
        ->orWhereHas('departamento', function (Builder $query) use ($texto){
            $query->WhereRaw('UPPER(nombre_departamento) LIKE ?',['%' . strtoupper($texto) . '%']);
        })
        ->orderBy('id','asc')
        ->role('Referente')
        ->paginate(5);
        return view('referentes.index_referente', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('super_create'), 403);//si el usuario no tiene el permiso "user_create" mostrara error 403
        $roles = Role::All()->pluck('name', 'id');
        return view('users.create', compact('roles'),['establecimiento'=>Establecimiento::all(),'subdirecciones'=>SubDireccion::all(),'departamentos'=>Departamento::all()]);
    }

    public function create_administrador()
    {
        abort_if(Gate::denies('admin_create'), 403);//si el usuario no tiene el permiso "user_create" mostrara error 403
        $roles = Role::Where('id','2')->pluck('name', 'id');
        return view('administradores.create_administrador', compact('roles'),['establecimiento'=>Establecimiento::all(),'subdirecciones'=>SubDireccion::all(),'departamentos'=>Departamento::all()]);
    }

    public function create_referente()
    {
        abort_if(Gate::denies('index'), 403);//si el usuario no tiene el permiso "user_create" mostrara error 403
        $roles = Role::Where('id','3')->pluck('name', 'id');
        return view('referentes.create_referente', compact('roles'),['establecimiento'=>Establecimiento::all(),'subdirecciones'=>SubDireccion::all(),'departamentos'=>Departamento::all()]);
    }

    public function store(UserCreateRequest $request)
    {
        $user = User::create($request->only('name', 'rut', 'email','establecimiento','subrogante','correo_subrogante','id_subdireccion','id_departamento')
            +[
                'password' => bcrypt($request->input('password')),
            ]);

        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario creado correctamente.');
    }
    public function store_administrador(UserCreateRequest $request)
    {
        $user = User::create($request->only('name', 'rut', 'email','establecimiento','subrogante','correo_subrogante','id_subdireccion','id_departamento')
            +[
                'password' => bcrypt($request->input('password')),
            ]);

        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario creado correctamente.');
    }

    public function store_referente(UserCreateRequest $request)
    {
        $user = User::create($request->only('name', 'rut', 'email','establecimiento','subrogante','correo_subrogante','id_subdireccion','id_departamento')
            +[
                'password' => bcrypt($request->input('password')),
            ]);

        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario creado correctamente.');
    }

    public function Show(User $user)
    {
        abort_if(Gate::denies('show'), 403);//si el usuario no tiene el permiso "user_show" mostrara error 403
        //$user = User::findOrFail($id);
        //dd($user);
        $user->load('roles');
        return view('users.show', compact('user'));
    }

    public function Show_administrador(User $user)
    {
        abort_if(Gate::denies('show'), 403);//si el usuario no tiene el permiso "user_show" mostrara error 403
        //$user = User::findOrFail($id);
        //dd($user);
        $user->load('roles');
        return view('administradores.show_administrador', compact('user'));
    }

    public function Show_referente(User $user)
    {
        abort_if(Gate::denies('show'), 403);//si el usuario no tiene el permiso "user_show" mostrara error 403
        //$user = User::findOrFail($id);
        //dd($user);
        $user->load('roles');
        return view('referentes.show_referente', compact('user'));
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('admin_edit'), 403);//si el usuario no tiene el permiso "user_edit" mostrara error 403
        //$user = User::findOrFail($id);
        //dd($user);
        $roles = Role::All()->pluck('name', 'id');
        $user->load('roles');
        return view('users.edit', compact('user', 'roles'),['establecimientos'=>Establecimiento::all(),'subdirecciones'=>SubDireccion::all(),'departamentos'=>Departamento::all()]);
    }

    public function edit_administrador(User $user)
    {
        abort_if(Gate::denies('admin_edit'), 403);//si el usuario no tiene el permiso "user_edit" mostrara error 403
        //$user = User::findOrFail($id);
        //dd($user);
        $roles = Role::Where('id','2')->pluck('name', 'id');
        $user->load('roles');
        return view('administradores.edit_administrador', compact('user', 'roles'),['establecimientos'=>Establecimiento::all(),'subdirecciones'=>SubDireccion::all(),'departamentos'=>Departamento::all()]);
    }

    public function edit_referente(User $user)
    {
        abort_if(Gate::denies('index'), 403);//si el usuario no tiene el permiso "user_edit" mostrara error 403
        //$user = User::findOrFail($id);
        //dd($user);
        $roles = Role::Where('id','3')->pluck('name', 'id');
        $user->load('roles');
        return view('referentes.edit_referente', compact('user', 'roles'),['establecimientos'=>Establecimiento::all(),'subdirecciones'=>SubDireccion::all(),'departamentos'=>Departamento::all()]);
    }

    public function update(UserEditRequest $request, User $user)
    {
        //$user=User::findOrFail($id);
        $data = $request->only('name','rut','email','establecimiento','subrogante','correo_subrogante','id_subdireccion','id_departamento');
        $password=$request->input('password');
        if($password)
            $data['password']=bcrypt($password);
        //if(trim($request->password)=='')
        //{
        //    $data=$request->except('password');
        //}
        //else {
        //    $data=$request->all();
        //    $data['password']=bcrypt($request->password);
        //}
        $user->update($data);
        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario actualizado correctamente');
    }

    public function update_administrador(UserEditRequest $request, User $user)
    {
        //$user=User::findOrFail($id);
        $data = $request->only('name','rut','email','establecimiento','subrogante','correo_subrogante','id_subdireccion','id_departamento');
        $password=$request->input('password');
        if($password)
            $data['password']=bcrypt($password);
        $user->update($data);
        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('administradores.Show_administrador', $user->id)->with('success', 'Usuario actualizado correctamente');
    }

    public function update_referente(UserEditRequest $request, User $user)
    {
        //$user=User::findOrFail($id);
        $data = $request->only('name','rut','email','establecimiento','subrogante','correo_subrogante','id_subdireccion','id_departamento');
        $password=$request->input('password');
        if($password)
            $data['password']=bcrypt($password);
        $user->update($data);
        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('referentes.Show_referente', $user->id)->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user, Request $request)
    {
        abort_if(Gate::denies('admin_destroy'), 403);//si el usuario no tiene el permiso "user_destroy" mostrara error 403
        if(!$user->contrato()->exists()){
            if(auth()->user()->id == $user->id){
                return redirect()->route('users.index');
            }
            $user -> delete();
            return back()->with('success', 'Usuario eliminado correctamente');
          } else {
            return back()->with('success', 'Usuario activo en contrato');
          } 
        
    }
}
