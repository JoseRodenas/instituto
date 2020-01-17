<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    public function alumnoObject() {
        return $this->belongsTo('App\User', 'alumno');
    }
}
