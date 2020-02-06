<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Periodoclase extends Model
{
    protected $table = "periodosclases";
    protected $fillable = ['periodo_id','materiaimpartida_id', 'aula_id'];

    public function periodoObject() {
        return $this->belongsTo('App\Periodolectivo', 'periodo_id');
    }

    public function materiaimpartidaObject() {
        return $this->belongsTo('App\Materiaimpartida', 'materiaimpartida_id');
    }

    public function aulaObject() {
        return $this->belongsTo('App\Aula', 'aula_id');
    }

    public function dameAlumnosMatriculados(){
        DB::enableQueryLog();
        $alumnos = DB::table('periodosclases')
            ->join('materiaimpartida', 'periodosclases.materiaimpartida_id', '=', 'materiaimpartida.id')
            ->join('grupo', 'materiaimpartida.grupo', '=', 'grupo.id')
            ->join('matricula', 'grupo.id', '=', 'matricula.grupo')
            ->join('users', 'matricula.alumno', '=', 'users.id')
            ->get();
        dd(DB::getQueryLog());
    }
    /* Crea, en el modelo App/Periodoclase, el método $periodoclase->alumnos(), 
    que devuelva los alumnos que deben estar presentes en ese peridoclase por estar matriculado 
    en el grupo relacionado. */
    
    
}
