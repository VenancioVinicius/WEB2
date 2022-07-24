<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CidadeController extends Controller {
    
    public $cidade = [[
        'id' => 1,
        'cidade'  => 'Paranagua',
        'porte' => 'media'
    ]];

    public function __construct() {

        $aux = session('cidade');

        if(!isset($aux)) {
            session(['cidade' => $this->cidade]);
        }
    }

    public function index() {

       $cidade = session('cidade');
       return view('cidade.index', compact('cidade'));
    }

    public function create() {

        return view('cidade.create');
    }

    public function store(Request $request) {

        $aux = session('cidade');
       
        $ids = array_column($aux, 'id');
       
        if(count($ids) > 0) {
           $new_id = max($ids) + 1;
        }
        else {
           $new_id = 1;
        }
       
        $novo = [  
           'id' => $new_id,
           'cidade' => $request->cidade,
           'porte' => $request->porte
        ];
       
        array_push($aux, $novo);
       
        session(['cidade' => $aux]);
       
        return redirect()->route('cidade.index');
    }

    public function edit($id) {

       $aux = session('cidade');

       $indice = array_search($id, array_column($aux, 'id'));

       $dados = $aux[$indice];

       return view('cidade.edit', compact('dados')); 
    }

    public function update(Request $request, $id) {
        
       $alterado = [
        'id' => $id,
        'cidade' => $request->cidade,
        'porte' => $request->porte
        ];

        $aux = session('cidade');
        
        $indice = array_search($id, array_column($aux, 'id'));
        
        $aux[$indice] = $alterado;
        
        session(['cidade' => $aux]);
        
        return redirect()->route('cidade.index');
    }

    public function destroy($id) {
        
        $aux = session('cidade');

        $indice = array_search($id, array_column($aux, 'id'));
        
        unset($aux[$indice]);
        
        session(['cidade' => $aux]);
        
        return redirect()->route('cidade.index');
    }
}
