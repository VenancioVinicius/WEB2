<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eixo extends Model {

    use HasFactory;
    protected $table = "eixos";
    
    protected $fillable = [
        'nome',
    ];

    public function curso() {
        return $this->hasMany('\App\Models\Curso');
    }

    public function professor() {
        return $this->hasMany('\App\Models\Professor');
    }


}
