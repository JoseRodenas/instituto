<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiamatriculada extends Model {
    protected $table = "materiamatriculada";

    public function userObject() {
        return $this->belongsTo('\App\User', 'alumno');
    }

    public function grupoObject() {
        return $this->belongsTo('\App\Grupo', 'grupo');
    }

    public function materiaObject() {
        return $this->belongsTo('\App\Materia', 'materia');
    }

}
