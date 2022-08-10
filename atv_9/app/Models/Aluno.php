<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Concerns\InteractsWithPivotTable;

class Aluno extends Model
{
    use HasFactory;

    public function curso(){
        return $this->belongsTo('\App\Models\Curso');
    }

    public function disciplina() {

        return $this->belongsToMany('\App\Models\Disciplina', 'matriculas');

    }
}
