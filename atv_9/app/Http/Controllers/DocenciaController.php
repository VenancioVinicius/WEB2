<?php

namespace App\Http\Controllers;

use App\Models\Docencia;
use App\Models\Diciplina;
use App\Models\Professor;
use Illuminate\Http\Request;

class DocenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Docencia::with(['diciplina','professor'])->get();
        $diciplina = Diciplina::all();
        $professor = Professor::orderBy('id')->get();

        return view('docencia.index', compact('dados','diciplina','professor'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $dados = Docencia::all();
        $diciplina = Diciplina::all();
        $professor = Professor::where('ativo', '=', 1)->get();

        return view('docencia.create', compact('dados','diciplina','professor'));
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
            'id_professor' => 'required',
            'id_diciplina' => 'required',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",

        ];

        $request->validate($regras, $msgs);

        Docencia::create([
            'id_diciplina' => $request->id_diciplina,
            'id_professor' => $request->id_professor,
        ]);

        return redirect()->route('docencia.index');
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
        $dados = Docencia::all();
        $diciplina = Diciplina::all();
        $professor = Professor::all();

        return view('docencia.edit', compact('dados','professor','diciplina'));
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
        $obj = Docencia::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $valid = [
            'id_professor' => 'required',
            'id_diciplina' => 'required',
        ];


        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
        ];

        $request->validate($valid, $msgs);

        $obj->fill([
            'id_diciplina' => $request->id_diciplina,
            'id_professor' => $request->id_professor,
        ]);

        $obj->save();

        return redirect()->route('docencia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Docencia::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy();

        return redirect()->route('docencia.index');
    }
}
