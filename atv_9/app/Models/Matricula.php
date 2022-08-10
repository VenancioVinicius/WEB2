<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $table = "matriculas";

    protected $fillable = [
        'aluno_id', 'diciplina_id'
    ];

    public function aluno(){

        return $this->hasMany('App\Models\Aluno');

    }

    public function disciplina(){

        return $this->hasMany('App\Models\Disciplina');

    }
}
