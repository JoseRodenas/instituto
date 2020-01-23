<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnyoEscolarResource extends JsonResource
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
            'id' => $this->id,
            'fechainicio' => $this->fechainicio,
            'fechafinal' => $this->fechafinal,
            'centros' =>  $this->centroObject, // relación con centros
        ];
    }
}
