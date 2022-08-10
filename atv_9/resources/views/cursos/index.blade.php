<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Cursos", 'rota' => "cursos.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Cursos @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">

            <!-- Utiliza o componente "datalist" criado -->
            <x-datalist
                :title="'Cursos'"
                :crud="'cursos'"
                :header="['NOME','SIGLA', 'EIXO','AÇÕES']"

                :data="$dados"
                :hide="[true,true,true,true]"
                :info="['id','nome','sigla']"
                :remove="'id'"
            />
        </div>
    </div>
@endsection
