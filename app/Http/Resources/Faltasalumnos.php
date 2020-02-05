<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Faltasalumnos extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
         "idfaltasalumno" => $this->idfaltasalumno,
         "alumno" => $this->userObject,
         "asiste" => $this->asiste,
         "retraso" => $this->retraso,
         "justificada" =>$this->justificada,
         "periodoclase_id" =>$this->periodoClaseObject
        ];
    }
}
