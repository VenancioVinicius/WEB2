<h2>Alterar Cidade</h2>
<form action="{{ route('cidade.update', $dados['id']) }}" method="POST">
   <!-- Token de Segurança -->
   <!-- Define o método de submissão como PUT -->
   @csrf
   @method('PUT')
   <a href="{{route('cidade.index')}}"><h4>voltar</h4></a>
   <label>Cidade: </label> <input type='text' name='cidade' value='{{$dados['cidade']}}'>
   <label>Porte: </label> 
   <select name="porte">
      <option value="">{{$dados['porte']}}</option>
      <option value="Pequeno">Pequeno</option>
      <option value="Medio">Medio</option>
      <option value="Grande">Grande</option>
   </select>
   <input type="submit" value="Salvar">
</form>