<form action="{{ route('pedido-produto.store', ['pedido' => $pedido->id]) }}" method="post">
    @csrf
    <select name="produto_id" class="borda-preta">
        <option value="">Selecione um Produto</option>
        @foreach($produtos as $produto)
            <option
                value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' : '' }}>{{  $produto->nome }}</option>
        @endforeach
    </select>
    @if($errors->has('produto_id'))
        <div class="alert alert-danger"
             role="alert">{{ $errors->first('produto_id') }}</div>
    @endif
    <input type="number" name="quantidade" placeholder="Quantidade"
           class="borda-preta" value="{{ old('quantidade') ?? '' }}">
    @if($errors->has('quantidade'))
        <div class="alert alert-danger"
             role="alert">{{ $errors->first('quantidade') }}</div>
    @endif
    <button type="submit" class="borda-preta">Cadastrar</button>
    @if(isset($msg) && !$errors->any())
        <div class="alert alert-success" role="alert">{{ $msg }}</div>
    @endif
</form>
