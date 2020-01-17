<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = "materia";

    public function MateriaImpartida ()
    {
        return $this->hasMany('App\MateriaImpartida', 'materia');
    }

    public function MateriaMatriculada ()
    {
        return $this->hasMany('App\MateriaMatriculada', 'materia');
    }
}
