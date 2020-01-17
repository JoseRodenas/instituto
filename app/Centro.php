<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
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
}
