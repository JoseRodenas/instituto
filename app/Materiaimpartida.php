<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiaimpartida extends Model
{
    protected $table = 'materiasimpartidas';

    public function userObject() {
        return $this->belongsTo('\App\User', 'docente');
    }

    public function grupoObject() {
        return $this->belongsTo('\App\Grupo', 'grupo');
    }

    public function materiaObject() {
        return $this->belongsTo('\App\Materia','materia');
    }
}
