<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = 'niveles';

    protected $fillable = ['nombre','nivelsuperior'];

    public function grupos() {
        return $this->hasMany('\App\Grupo','nivel');
    }

    public function niveles() {
        return $this->hasMany('\App\Nivel','nivelsuperior');
    }

    public function nivelObject() {
        return $this->belongsTo('\App\Nivel','nivelsuperior');
    }
}
