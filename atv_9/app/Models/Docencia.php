<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docencia extends Model {

    use HasFactory;
    protected $table = "docencia";

    protected $fillable = [
        'id_diciplina', 'id_professor'
    ];

    public function diciplina() {
        return $this->belongsTo('App\Models\Diciplina');
    }

    public function professor() {
        return $this->belongsTo('App\Models\Professor');
    }


}
