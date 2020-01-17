<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutorizado extends Model
{
    public function tutorObject() {
        return $this->belongsTo('App\User', 'tutor');
    }

    public function tutoradoObject() {
        return $this->belongsTo('App\User', 'tutorado');
    }
}
