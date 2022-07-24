<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Diciplinas", 'rota' => "diciplinas.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Diciplinas @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">

            <!-- Utiliza o componente "datalist" criado -->
            <x-datalist
                :title="'Diciplinas'"
                :crud="'diciplinas'"
                :header="['NOME', 'CURSO', 'AÇÕES']"
                :data="$dados"
                :hide="[true,true,false]"
                :info="['id','nome','carga']"
                :remove="''"
            />
        </div>
    </div>
@endsection
