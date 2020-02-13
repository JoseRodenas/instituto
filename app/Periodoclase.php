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
        $alumnos = DB::table('periodosclases')
            ->join('materiasimpartidas', 'periodosclases.materiaimpartida_id', '=', 'materiasimpartidas.id')
            ->join('grupos', 'materiasimpartidas.grupo', '=', 'grupos.id')
            ->join('matriculas', 'grupos.id', '=', 'matriculas.grupo')
            ->join('users', 'matriculas.alumno', '=', 'users.id')
            ->get();
            
            $coleccion = $alumnos->map(function ($item, $key) {
                return $item->alumno;
            });
            
            $users = DB::table('users')
                    ->whereIn('id', $coleccion)
                    ->get();
            
            return $users;
    }
}
