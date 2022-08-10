<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Eixos", 'rota' => "eixos.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Eixos @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">

            <!-- Utiliza o componente "datalist" criado -->
            <x-datalist
                :title="'Eixos'"
                :crud="'eixos'"
                :header="['NOME','']"

                :data="$dados"
                :hide="[true,true]"
                :info="['nome']"
                :remove="'nome'"
            />
        </div>
    </div>
@endsection
