<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Professores", 'rota' => "professores.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Professores @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            
            <!-- Utiliza o componente "datalist" criado -->
            <x-datalist 
                :title="'Professores'"
                :crud="'professores'"
                :header="['NOME', 'EIXO', 'STATUS', 'AÇÕES']" 
                :fields="['nome', 'eixo_nome']"
                :data="$dados"
                :hide="[true, true, false, true, true,  true,true]" 
                :info="['id','ativo', 'nome','email','eixo']"
                :remove="'nome'"
            />
        </div>
    </div>
@endsection
