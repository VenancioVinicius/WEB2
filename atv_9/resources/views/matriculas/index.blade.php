<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Matricula", 'rota' => "matriculas.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Matricula (2022) @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            <table class="table align-middle caption-top table-striped">
                <caption>Tabela de <b>Matricula</b></caption>
                <thead>
                <tr>
                    <th scope="col" class="d-none d-md-table-cell">Alunos</th>
                    <th scope="col" class="d-none d-md-table-cell">Diciplinas</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($dados as $item)
                        <tr>
                            <td>
                                @foreach ($aluno as $d)
                                    @if($d->id == $item->aluno_id)
                                        {{$d->nome}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($diciplina as $p)
                                    @if($p->id == $item->diciplina_id)
                                        {{$p->nome}}
                                    @endif
                                @endforeach
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
