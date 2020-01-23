<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Tutorizado;
use Illuminate\Http\Request;
use App\Http\Resources\TutorizadoResource;

class TutorizadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TutorizadoResource::collection(Tutorizado::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tutorizado = Tutorizado::create(json_decode($request->getContent(), true));
        return new TutorizadoResource($tutorizado);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tutorizado  $tutorizado
     * @return \Illuminate\Http\Response
     */
    public function show(Tutorizado $tutorizado)
    {
        return new TutorizadoResource($tutorizado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tutorizado  $tutorizado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutorizado $tutorizado)
    {
        $tutorizado->update(json_decode($request->getContent(), true));
        return new TutorizadoResource($tutorizado);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tutorizado  $tutorizado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutorizado $tutorizado)
    {
        $tutorizado->delete();
    }
}
