<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Docencia", 'rota' => "docencia.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Docência (2022) @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            <table class="table align-middle caption-top table-striped">
                <caption>Tabela de <b>Docência</b></caption>
                <thead>
                <tr>
                    <th scope="col" class="d-none d-md-table-cell">DISCIPLINA</th>
                    <th scope="col" class="d-none d-md-table-cell">PROFESSOR</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($dados as $item)
                        <tr>
                            <td>
                                @foreach ($diciplina as $d)
                                    @if($d->id == $item->id_diciplina)
                                        {{$d->nome}}
                                    @endif
                                @endforeach        
                            </td>
                            <td>
                                @foreach ($professor as $p)
                                    @if($p->id == $item->id_professor)
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