<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Datalist extends Component {

    // Atributos Definidos
    
    public $title;
    public $crud;
    public $header;
    public $fields;
    public $data;
    public $hide;
    public $info;
    public $remove;

    // Parâmetros recebidos via costrutor

    public function __construct($title, $crud, $header, $fields, $data, $hide, $info, $remove) {
        $this->title = $title;   
        $this->crud = $crud;
        $this->header = $header;
        $this->fields = $fields;
        $this->data = $data;    
        $this->hide = $hide;
        $this->info = $info;      
        $this->remove = $remove;
    }

    public function render() {

        return view('components.datalist');
        
    }
}