<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faltasalumnos extends Model
{
protected $table = "faltasalumnos";

protected $fillabe = ["idfaltasalumno", "alumno", "asiste", "retraso", "justificada", "periodoclase_id"];

public function userObject() {
    return $this->belongsTo('\App\User', 'alumno');
}

public function periodoClaseObject() {
    return $this->belongsTo('\App\Periodoclases', 'periodoclase_id');
}
}
