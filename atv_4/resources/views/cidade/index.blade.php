<h2>Lista de Cidades</h2>
<a href="{{ route('cidade.create') }}"><h4>Nova cidade</h4></a>
<table>
   <thead>
       <tr>
           <th>ID</th>
           <th>CIDADE</th>
           <th>PORTE</th>
           <th>EDITAR</th>
           <th>REMOVER</th>
       </tr>
   </thead>
   <tbody>
       <!-- Funcionalidade Blade / Laço Repetição -->
       <!-- Percorre o array clientes enviado pela Controller -->
       @foreach ($cidade as $item)
           <tr>
               <!-- Acessa os campos de cada item do array -->
               <td>{{ $item['id'] }}</td>
               <td>{{ $item['cidade'] }}</td>
               <td>{{ $item['porte'] }}</td>
               <td><a href="{{ route('cidade.edit', $item['id']) }}">editar</a></td>
               <td>
                   <form action="{{ route('cidade.destroy', $item['id']) }}" method="POST">
                       <!-- Token de Segurança -->
                       <!-- Define o método de submissão como delete -->
                       @csrf
                       @method('DELETE')
                       <input type='submit' value='remover'>
                   </form>
               </td>
           </tr>
       @endforeach
   </tbody>
</table>