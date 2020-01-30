<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Materiamatriculada;
use Illuminate\Http\Request;
use App\Http\Resources\MateriamatriculadaResource;
use Illuminate\Support\Facades\Auth;
class MateriamatriculadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->authorizeResource(Materiamatriculada::class, 'materiamatriculada');
    }


    public function index()
    {
        return MateriamatriculadaResource::collection(Materiamatriculada::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $materiamatriculada = Materiamatriculada::create(json_decode($request->getContent(), true));


        return new MateriamatriculadaResource($materiamatriculada);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materiamatriculada  $materiamatriculada
     * @return \Illuminate\Http\Response
     */
    public function show(Materiamatriculada $materiamatriculada)
    {
         return new MateriamatriculadaResource($materiamatriculada);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materiamatriculada  $materiamatriculada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materiamatriculada $materiamatriculada)
    {
        $materiamatriculada->update(json_decode($request->getContent(), true));
        return new MateriamatriculadaResource($materiamatriculada);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materiamatriculada  $materiamatriculada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materiamatriculada $materiamatriculada)
    {
        $materiamatriculada->delete();
    }
}
