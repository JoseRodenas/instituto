<?php

namespace App;

use App\Http\Resources\PeriodoclaseResource;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Centro extends Model
{
    protected $fillable = ['codigo', 'nombre', 'web', 'situacion', 'coordinador'];
    /**
     * Get the anyosescolares for the centro.
     */
    public function anyosescolares()
    {
        return $this->hasMany('App\Anyoescolar', 'centro');
    }

    /**
     * Get the coordinador that owns the centro.
     */
    public function coordinadorObject()
    {
        return $this->belongsTo('App\User', 'coordinador');
    }

    public function misGrupos() {
        return $this->hasManyThrough(
            'App\Grupo',
            'App\Anyoescolar',
            'centro', // Foreign key on anyosescolares table...
            'anyoescolar', // Foreign key on grupos table...
            'id', // Local key on centros table...
            'id' // Local key on anyosescolares table...
        );
    }

    public function aulas(){
        return $this->hasMany('App\Aula', 'centro_id');
    }

    public static function periodoActual(){
        $user = Auth::user();
        $ahora = Carbon::now();
        $weekMap = [
            0 => 'D',
            1 => 'L',
            2 => 'M',
            3 => 'X',
            4 => 'J',
            5 => 'V',
            6 => 'S',
        ];
        $dayOfTheWeek = Carbon::now()->dayOfWeek;
        $ahora->setTimezone('Europe/Madrid');
        $resultahora = $ahora->format('H:i:s');

        $resultadia =  $weekMap[$dayOfTheWeek];

        $periodoclasejoin = DB::table('periodosclases')
            ->join('materiasimpartidas', 'periodosclases.materiaimpartida_id', '=', 'materiasimpartidas.id')
            ->join('users', 'materiasimpartidas.docente', '=', 'users.id')
            ->join('periodoslectivos','periodosclases.periodo_id','=','periodoslectivos.id')
            ->where('users.id','=', $user->id)->where('dia','=',$resultadia)->where('hora_inicio','<=',$resultahora)->where('hora_fin','>=', $resultahora)
            ->first();
        if(is_object($periodoclasejoin) ) {
            $periodoclase = Periodoclase::find($periodoclasejoin->id);
        } else {
            $periodoclase = new Periodoclase();
        }

        return new PeriodoclaseResource($periodoclase);
    }

}
