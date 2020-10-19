<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Carbon\Carbon;

class UsersController extends Controller
{


  function __construct()
  {
    $this->middleware('permission:usuarios-listar');
    $this->middleware('permission:usuarios-crear', ['only' => ['create', 'store']]);
    $this->middleware('permission:usuarios-editar', ['only' => ['edit', 'update']]);
    $this->middleware('permission:usuarios-borrar', ['only' => ['destroy']]);
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $data = User::orderBy('id', 'DESC')->get();
    return view('users.index', compact('data'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $roles = Role::get();
    return view('users.create', ['roles' => $roles]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $this->validate($request, [
      'name' => 'required',
      'username' => 'required|unique:users,username|alpha_dash',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|same:confirm-password',
      'roles' => 'required'
    ]);


    $input = $request->all();
    $input['password'] = Hash::make($input['password']);


    $user = User::create($input);
    $user->assignRole($request->input('roles'));


    return redirect()->route('users.index')->with('success', 'Usuario creado con éxito');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $user = User::find($id);
    return view('users.show')->with('user', $user);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $user = User::find($id);
    $roles = Role::get();
    $userRole = $user->roles->pluck('name', 'name')->all();


    return view('users.edit', compact('user', 'roles', 'userRole'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email|unique:users,email,' . $id,
      'roles' => 'required'
    ]);

    


    $user = User::find($id);

    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->rut = $request->input('rut');
    $user->celular = $request->input('celular');

    $user->save();


    DB::table('model_has_roles')->where('model_id', $id)->delete();
    $user->assignRole($request->input('roles'));


    return redirect()->route('users.index')->with('success', 'Usuario actualizado con éxito');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    User::find($id)->delete();
    return redirect()->route('users.index')->with('success', 'Usuario borrado con éxito');
  }

  public function delete($id)
  {
    $user = User::find($id);
    $roles = Role::get();
    $userRole = $user->roles->pluck('name', 'name')->all();

    //return view for specified action
    //if action is delete, call this view, etc...
    return view('users.delete', compact('user', 'roles', 'userRole'));
  }

  public function recuperar(Request $request)
  {
    $data = User::onlyTrashed()->orderBy('id', 'DESC')->get();
    return view('users.recuperar', compact('data'));
  }

  public function undelete($id)
  {
    $user = User::withTrashed()->find($id);
    $roles = Role::get();
    $userRole = $user->roles->pluck('name', 'name')->all();

    return view('users.undelete', compact('user', 'roles', 'userRole'));
  }

  public function restore($id)
  {
    User::withTrashed()->find($id)->restore();
    return redirect()->route('users.index')->with('success', 'Usuario recuperado con éxito');
  }

}
