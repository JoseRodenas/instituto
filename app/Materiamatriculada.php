<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiamatriculada extends Model
{
    protected $table = "materiamatriculada";

    public function Usuario()
    {
        return $this->belongsTo('App\Usuario', 'alumno');
    }
    public function Grupo()
    {
        return $this->belongsTo('App\Grupo', 'grupo');
    }
    public function Materia()
    {
        return $this->belongsTo('App\Materia', 'materia');
    }
}
