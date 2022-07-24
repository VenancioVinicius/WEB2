<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diciplina extends Model {

    use HasFactory;
    protected $table = "diciplinas";

    protected $fillable = [
        'nome','carga','curso_id',
    ];

    public function curso() {
        return $this->belongsTo('\App\Models\Curso');
    }



}
