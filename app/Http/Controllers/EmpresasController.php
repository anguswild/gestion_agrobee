<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class EmpresasController extends Controller
{

  function __construct()
  {
    $this->middleware('permission:empresas-listar');
    $this->middleware('permission:empresas-crear', ['only' => ['create', 'store']]);
    $this->middleware('permission:empresas-editar', ['only' => ['edit', 'update']]);
    $this->middleware('permission:empresas-borrar', ['only' => ['destroy']]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $empresas = Empresa::orderBy('created_at', 'desc')->get();
    return view('empresas.index')->with('empresas', $empresas);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('empresas.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    request()->validate([
      'nombre' => 'required',
    ]);

    Empresa::create($request->all());

    return redirect()->route('empresas.index')->with('success', 'Empresas creada con éxito.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Empresa $empresa)
  {
    return view('empresas.show', compact('empresa'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $empresa = Empresa::findOrFail($id);

    return view('empresas.edit')->with('empresa', $empresa);
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
    request()->validate([
      'nombre' => 'required',
    ]);

    $client = Empresa::findOrFail($id);

    $client->nombre = $request->input('nombre');
    $client->rut = $request->input('rut');
    $client->direccion = $request->input('direccion');
    $client->giro = $request->input('giro');

    $client->save();

    return redirect()->route('empresas.index')->with('success', 'Empresa actualizada con éxito');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $client = Empresa::findOrFail($id);
    $client->delete();

    return redirect()->route('empresas.index')->with('success', 'Empresa borrada con éxito');
  }

  public function delete($id)
  {
    $empresa = Empresa::findOrFail($id);
    return view('empresas.delete')->with('empresa', $empresa);
  }
}
