<?php

namespace App\Http\Controllers;

use App\Models\Eixo;
use Illuminate\Http\Request;

class EixoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Eixo::all();
        return view('eixos.index', compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eixos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|max:50|min:4',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
            "unique" => "Já existe um endereço cadastrado com esse [:attribute]!"
        ];
 
        $request->validate($regras, $msgs);

        Eixo::create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
        ]);
        
        return redirect()->route('eixos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $nome
     * @return \Illuminate\Http\Response
     */
    public function show($nome){}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $nome
     * @return \Illuminate\Http\Response
     */
    public function edit($nome)
    {
        $dados = Eixo::find($nome);

        if(!isset($dados)) { return "<h1>NOME: $nome não encontrado!</h1>"; }

        return view('eixos.edit', compact('dados'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $nome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nome)
    {
        $obj = Eixo::find($nome);

        if(!isset($obj)) { return "<h1>NOME: $nome não encontrado!"; }

        $obj->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
        ]);

        $obj->save();

        return redirect()->route('eixos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $nome
     * @return \Illuminate\Http\Response
     */
    public function destroy($nome)
    {
        Eixo::destroy($nome);
        return redirect()->route('eixos.index');
    }
}
