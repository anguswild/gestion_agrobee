<?php

namespace App\Http\Controllers;

use App\Aplicacion;
use App\Empresa;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;
use Mail;

class AplicacionController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:aplicaciones-listar');
        $this->middleware('permission:aplicaciones-crear', ['only' => ['create', 'store']]);
        $this->middleware('permission:aplicaciones-editar', ['only' => ['edit', 'update']]);
        $this->middleware('permission:aplicaciones-borrar', ['only' => ['destroy', 'delete']]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aplicaciones = Aplicacion::orderBy('created_at', 'desc')->get();
        return view('aplicaciones.index')->with('aplicaciones', $aplicaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::orderBy('created_at', 'desc')->get();
        $users = User::orderBy('created_at', 'desc')->get();
        return view('aplicaciones.create', compact('empresas', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        request()->validate([
            'empresa_id' => 'required',
            'user_id' => 'required',
            'fecha_aplicacion' => 'required',
            'tipo_maquinaria' => 'required',
            'nombre_producto' => 'required',
            'dosis' => 'required',
            'cantidad_agua' => 'required',
            'cantidad_hectareas' => 'required'
        ]);

        if ($input['fecha_aplicacion'] != "") {
            $input['fecha_aplicacion'] = Carbon::createFromFormat('d/m/Y', $input['fecha_aplicacion']);
            $input['fecha_aplicacion'] = $input['fecha_aplicacion']->format('Y-m-d');
        }



        $aplicacion = Aplicacion::create($input);

        $data = [
            'aplicacion' => $aplicacion
          ];

        Mail::send('aplicaciones.mail', $data, function($message)use($data, $aplicacion){

            $pdf = PDF::loadView('aplicaciones.pdf', $data);

            $message->to($aplicacion->Encargado->email, $aplicacion->Encargado->name)->subject('Aviso de Nueva Aplicación');

            $message->from('agrobeechile@agrobeechile.cl','Gestión AgroBee Chile');

            $message->attachData($pdf->output(), 'Aplicacion_ID_'.$aplicacion->id.'.pdf');

        });

        return redirect()->route('aplicaciones.index')->with('success', 'Aplicación creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aplicacion  $aplicacion
     * @return \Illuminate\Http\Response
     */
    public function show(Aplicacion $aplicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aplicacion  $aplicacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aplicacion = Aplicacion::findOrFail($id);
        $empresas = Empresa::orderBy('created_at', 'desc')->get();
        $users = User::orderBy('created_at', 'desc')->get();

        return view('aplicaciones.edit', compact('aplicacion', 'empresas', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aplicacion  $aplicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'empresa_id' => 'required',
            'user_id' => 'required',
            'fecha_aplicacion' => 'required',
            'tipo_maquinaria' => 'required',
            'nombre_producto' => 'required',
            'dosis' => 'required',
            'cantidad_agua' => 'required',
            'cantidad_hectareas' => 'required'
        ]);

        $aplicacion = Aplicacion::findOrFail($id);

        $aplicacion->empresa_id = $request->input('empresa_id');
        $aplicacion->user_id = $request->input('user_id');
        if ($request->input('fecha_aplicacion') != "") {
            $input_fecha = Carbon::createFromFormat('d/m/Y', $request->input('fecha_aplicacion'));
            $input_fecha = $input_fecha->format('Y-m-d');

            $aplicacion->fecha_aplicacion = $input_fecha;
        }

        $aplicacion->tipo_maquinaria = $request->input('tipo_maquinaria');
        $aplicacion->nombre_producto = $request->input('nombre_producto');
        $aplicacion->dosis = $request->input('dosis');
        $aplicacion->cantidad_agua = $request->input('cantidad_agua');
        $aplicacion->cantidad_hectareas = $request->input('cantidad_hectareas');

        $aplicacion->save();

        return redirect()->route('aplicaciones.index')->with('success', 'Aplicación actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aplicacion  $aplicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aplicacion = Aplicacion::findOrFail($id);
        $aplicacion->delete();

        return redirect()->route('aplicaciones.index')->with('success', 'Aplicación borrada con éxito');
    }

    public function delete($id)
    {
        $aplicacion = Aplicacion::findOrFail($id);
        return view('aplicaciones.delete')->with('aplicacion', $aplicacion);
    }

    public function PDF($id)
    {
        $aplicacion = Aplicacion::findOrFail($id);

        $data = [
            'aplicacion' => $aplicacion
        ];

        $pdf = PDF::loadView('aplicaciones.pdf', $data);

        return $pdf->stream('Aplicacion_ID_' . $aplicacion->id . '.pdf');
    }
}
