<?php

namespace App\Http\Controllers\API;

use App\Faltasalumnos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FaltasalumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faltasalumnos  $faltasalumnos
     * @return \Illuminate\Http\Response
     */
    public function show(Faltasalumnos $faltasalumnos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faltasalumnos  $faltasalumnos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faltasalumnos $faltasalumnos)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faltasalumnos  $faltasalumnos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faltasalumnos $faltasalumnos)
    {
        //
    }

    public function marcarasistencia(Faltasalumnos $faltasalumnos){
        $user = Auth::user();
        $alumno = Faltasalumnos::where('alumno', $user->id)->get()->first();
        $antes = new \DateTime(date($alumno->updated_at));
        $resultantes = $antes->format('Y-m-d H:i:s');
        $ahora = new \DateTime();
        $resultahora = $ahora->format('Y-m-d H:i:s');
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $resultantes);
        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $resultahora);
        $diff_in_minutes = $to->diffInMinutes($from);
        if ($diff_in_minutes <=5) {
            DB::table('faltasalumnos')
                ->where("idfaltasalumno", $alumno->idfaltasalumno)
                ->update(["asiste" => true]);
        };
    }
}
