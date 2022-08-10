<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model {

    use HasFactory;
    protected $table = "professores";
    
    protected $fillable = [
        'nome','email','siape','ativo','eixo_id',
    ];

    public function eixo() {
        return $this->belongsTo('\App\Models\Eixo');
    }

}
