<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use app\Models\Eixo;
use App\Models\Curso;
use App\models\Disciplina;
use App\models\Professor;
use App\models\Aluno;
use App\models\Matricula;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('templates.main')->with('titulo', "");
})->name('index');

Route::resource('eixos', 'EixoController');

Route::resource('cursos', 'CursoController');

Route::resource('professores', 'ProfessorController');

Route::resource('diciplinas', 'DiciplinasController');

Route::resource('docencia', 'DocenciaController');

Route::resource('alunos', 'AlunoController');

Route::resource('matriculas', 'MatriculaController');

/*

Route::post('profesors/add', function (Request $request){

    $obj_eixo = Eixo::find($request->eixo_id);

    if(isset($obj_eixo)){

        $obj_professor = new Professor();

        $obj_professor->nome = mb_strtoupper($request->nome, 'UTF-8');

        $obj_professor->email = mb_strtoupper($request->email, 'UTF-8');

        $obj_professor->siape = $request->siape;

        $obj_professor->eixo()->associate($obj_eixo);

        $obj_professor->ativo = $request->ativo;

        $obj_professor->save();

        return "<h1>Professor Cadastrado com Sucesso!</h1>";
    }

    return "<h1>[ERRO] Eixo NAO ENCONTRADO!</h1>";

});

Route::post('alunos/add', function (Request $request){

    $obj_aluno = new Aluno();

    $obj_aluno->nome = mb_strtoupper($request->nome, 'UTF-8');

    $obj_aluno->save();

    return "<h1>Aluno(a) Cadastrado(a) com Sucesso!</h1>";
});

Route::post('matriculas/add', function (Request $request){

    $obj_aluno = Aluno::find($request->aluno_id);

    $obj_disciplina = Disciplina::find($request->disciplina_id);

    if(isset($obj_aluno) && isset($obj_disciplina)){

        $obj_matricula = new Matricula();

        $obj_matricula->aluno() ->associate($obj_aluno);

        $obj_matricula->disciplina()->associate($obj_disciplina);

        $obj_matricula->save();

        return "<h1>Matricula Cadastrado com Sucesso!</h1>";
    }

    return "<h1>[ERRO] ALuno e/ou Matricula NAO ENCONTRADO(S)!</h1>";

});

Route::post('/matriculas/aluno', function (Request $request){

    $obj_aluno = Aluno::find($request->aluno_id);

    if(isset($obj_aluno)){

        $obj_aluno->disciplina()->detach();

        $disciplina = $request->input('disciplinas');

        foreach($disciplina as $item){

            $obj_disciplina = Disciplina::find($item['disciplina_id']);

            if(isset($obj_disciplina)){

                $obj_matricula = new Matricula();

                $obj_matricula->aluno() ->associate($obj_aluno);

                $obj_matricula->disciplina()->associate($obj_disciplina);

                $obj_matricula->save();

            }

        }

        return "<h1> Todas as Matriculas Efetuadas com Sucesso!</h1>";
    }

    return "<h1>[ERRO] ALuno e/ou Matricula NAO ENCONTRADO(S)!</h1>";

});

Route::get('/eixos', function() {

    $obj_eixo = Eixo::with(['disciplina'])->get;

    return $obj_eixo->toJson();

});

Route::get('/cursos', function() {

    $obj_curso = Curso::with(['disciplina'])->get;

    return $obj_curso->toJson();

});

Route::get('/disciplinas', function() {

    $obj_disciplina = Disciplina::with(['curso'])->get;

    return $obj_disciplina->toJson();

});

Route::get('/alunos', function () {

    $a = Aluno::with(['disciplina'])->get();

    return $a->toJson();

});

Route::get('/matriculas', function () {

    $obj_matricula = Matricula::with(['aluno', 'disciplina'])->get();

    return $obj_matricula->toJson();

});

Route::get('/disciplinas/alunos', function () {

    $obj_disciplina = Disciplina::with(['aluno'])->get();

    return $obj_disciplina->toJson();

});*/
