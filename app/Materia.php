<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model {
<<<<<<< HEAD
    protected $table = "materias";
=======
>>>>>>> 6d812decd20b97b9edaf58dc72d6e769b6894472

    public function materiasImpartidas() {
        return $this->hasMany('App\Materiaimpartida', "materia");
    }
    public function materiasMatriculadas() {
        return $this->hasMany('App\Materiamatriculada', "materia");
    }
}
