@if(isset($pedido->id))
    <form action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}" method="post">
        @method('PUT')
        @else
            <form action="{{ route('pedido.store') }}" method="post">
                @endif
                @csrf
                <select name="cliente_id" class="borda-preta">
                    <option value="">Selecione um Cliente</option>
                    @foreach($clientes as $cliente)
                        <option
                            value="{{ $cliente->id }}" {{ ($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : '' }}>{{  $cliente->nome }}</option>
                    @endforeach
                </select>
                @if($errors->has('cliente_id'))
                    <div class="alert alert-danger"
                         role="alert">{{ $errors->first('cliente_id') }}</div>
                @endif
                <button type="submit" class="borda-preta">
                    @if(isset($pedido->id))
                        Editar
                    @else
                        Cadastrar
                    @endif
                </button>
                @if(isset($msg) && !$errors->any())
                    <div class="alert alert-success" role="alert">{{ $msg }}</div>
                @endif
            </form>
