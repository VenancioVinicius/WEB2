<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Aluno;
use App\Models\Diciplina;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Matricula::all();
        $aluno = Aluno::all();
        $diciplina = Diciplina::orderBy('id')->get();

        return view('matriculas.index', compact('dados','aluno','diciplina'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $dados = Matricula::all();
        $aluno = Aluno::all();
        $diciplina = Diciplina::all();

        return view('matriculas.create', compact('dados','aluno','diciplina'));
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
            'diciplina_id' => 'required',
            'aluno_id' => 'required',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",

        ];

        $request->validate($regras, $msgs);

        Matricula::create([
            'aluno_id' => $request->aluno_id,
            'diciplina_id' => $request->diciplina_id,
        ]);

        return redirect()->route('matriculas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = Matricula::all();
        $aluno = Aluno::all();
        $diciplina = Diciplina::all();

        return view('matriculas.edit', compact('dados','diciplina','aluno'));
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
        $obj = Matricula::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $valid = [
            'id_diciplina' => 'required',
            'id_aluno' => 'required',
        ];


        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
        ];

        $request->validate($valid, $msgs);

        $obj->fill([
            'id_aluno' => $request->id_aluno,
            'id_diciplina' => $request->id_diciplina,
        ]);

        $obj->save();

        return redirect()->route('matriculas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Matricula::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy();

        return redirect()->route('matriculas.index');
    }
}
