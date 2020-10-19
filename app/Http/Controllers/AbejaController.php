<?php

namespace App\Http\Controllers;

use App\Abeja;
use App\Empresa;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;
use Mail;

class AbejaController extends Controller
{

    function __construct()
    {
      $this->middleware('permission:abejas-listar');
      $this->middleware('permission:abejas-crear', ['only' => ['create', 'store']]);
      $this->middleware('permission:abejas-editar', ['only' => ['edit', 'update']]);
      $this->middleware('permission:abejas-borrar', ['only' => ['destroy' , 'delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abejas = Abeja::orderBy('created_at', 'desc')->get();
        return view('abejas.index')->with('abejas', $abejas);
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
        return view('abejas.create' , compact('empresas','users'));
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
            'tipo_contrato' => 'required',
            'user_id' => 'required',
            'fecha_postura' => 'required',
            'sector_polinizacion' => 'required',
            'tipo_colmena' => 'required',
            'cantidad_colmenas' => 'required',
            'cultivo' => 'required',
            'responsable_entrega' => 'required'
          ]);

          if ($input['fecha_postura'] != "") {
            $input['fecha_postura'] = Carbon::createFromFormat('d/m/Y', $input['fecha_postura']);
            $input['fecha_postura'] = $input['fecha_postura']->format('Y-m-d');
        }



          $abeja = Abeja::create($input);

          $data = [
            'abeja' => $abeja
          ];

          Mail::send('abejas.mail', $data, function($message)use($data, $abeja){

            $pdf = PDF::loadView('abejas.pdf', $data);

            $message->to($abeja->Encargado->email, $abeja->Encargado->name)->subject('Aviso de Nueva Postura de Abejas');

            $message->from('agrobeechile@agrobeechile.cl','Gestión AgroBee Chile');

            $message->attachData($pdf->output(), 'Abeja_ID_'.$abeja->id.'.pdf');

        });

          return redirect()->route('abejas.index')->with('success', 'Abeja creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Abeja  $abeja
     * @return \Illuminate\Http\Response
     */
    public function show(Abeja $abeja)
    {
        return view('abejas.show', compact('abeja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Abeja  $abeja
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $abeja = Abeja::findOrFail($id);
        $empresas = Empresa::orderBy('created_at', 'desc')->get();
        $users = User::orderBy('created_at', 'desc')->get();

        return view('abejas.edit' , compact('abeja','empresas','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Abeja  $abeja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'empresa_id' => 'required',
            'tipo_contrato' => 'required',
            'user_id' => 'required',
            'fecha_postura' => 'required',
            'sector_polinizacion' => 'required',
            'tipo_colmena' => 'required',
            'cantidad_colmenas' => 'required',
            'cultivo' => 'required',
            'responsable_entrega' => 'required'
          ]);

          $abeja = Abeja::findOrFail($id);

          $abeja->empresa_id = $request->input('empresa_id');
          $abeja->tipo_contrato = $request->input('tipo_contrato');
          $abeja->user_id = $request->input('user_id');
          if ($request->input('fecha_postura') != "") {
            $input_fecha = Carbon::createFromFormat('d/m/Y', $request->input('fecha_postura'));
            $input_fecha = $input_fecha->format('Y-m-d');

            $abeja->fecha_postura = $input_fecha;
        }

          $abeja->sector_polinizacion = $request->input('sector_polinizacion');
          $abeja->tipo_colmena = $request->input('tipo_colmena');
          $abeja->cantidad_colmenas = $request->input('cantidad_colmenas');
          $abeja->cultivo = $request->input('cultivo');
          $abeja->observaciones = $request->input('observaciones');
          $abeja->responsable_entrega = $request->input('responsable_entrega');

          $abeja->save();

          return redirect()->route('abejas.index')->with('success', 'Abeja actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Abeja  $abeja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $abeja = Abeja::findOrFail($id);
        $abeja->delete();

        return redirect()->route('abejas.index')->with('success', 'Abeja borrada con éxito');
    }

    public function delete($id)
    {
      $abeja = Abeja::findOrFail($id);
      return view('abejas.delete')->with('abeja', $abeja);
    }

    public function PDF($id)
    {

      $abeja = Abeja::findOrFail($id);

      $data = [
        'abeja' => $abeja
    ];

    $pdf = PDF::loadView('abejas.pdf', $data);

    return $pdf->stream('Abeja_ID_'.$abeja->id.'.pdf');
    }
}
