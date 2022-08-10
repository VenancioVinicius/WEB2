<?php

namespace App\Http\Controllers;

use App\Models\Diciplina;
use App\Models\Curso;
use Illuminate\Http\Request;

class DiciplinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Diciplina::all();
        $dados2 = Curso::all();
        return view('diciplinas.index', compact('dados','dados2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados = Curso::all();
        return view('diciplinas.create',compact('dados'));
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
            'nome' => 'required|max:100|min:10',
            'carga' => 'required|max:12|min:1',
            'curso_id' => 'required',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
            "unique" => "Já existe um endereço cadastrado com esse [:attribute]!"
        ];

        $request->validate($regras, $msgs);

        $obj_curso = Curso::find($request->curso_id);

        if(isset($obj_curso)){

            $obj_disciplina = new Diciplina();

            $obj_disciplina->nome = mb_strtoupper($request->nome, 'UTF-8');

            $obj_disciplina->curso()->associate($obj_curso);

            $obj_disciplina->carga = $request->carga;

            $obj_disciplina->save();

            return redirect()->route('diciplinas.index');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = Diciplina::find($id);
        $curso = Curso::all();

        if(!isset($dados)) {
             return "<h1>ID: $id não encontrado!</h1>";
        }

        return view('diciplinas.edit', compact('dados','curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $obj = Diciplina::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $valid = [
            'nome' => 'required|max:100|min:10',
            'carga' => 'required|max:12|min:1',
            'curso_id' => 'required',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
            "unique" => "Já existe um endereço cadastrado com esse [:attribute]!"
        ];

        $request->validate($valid, $msgs);

        $obj->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'carga' => $request->carga,
            'curso_id' => $request->curso_id,
        ]);

        $obj->save();

        return redirect()->route('diciplinas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Diciplina::destroy($id);
        return redirect()->route('diciplinas.index');
    }
}
