<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PeriodoclaseResource extends JsonResource
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
            'periodo_id' => $this->periodoObject,
            'materiaimpartida' => $this->materiaimpartidaObject->materiaObject,
            'aula_id' => $this->aulaObject
        ];
    }
}
