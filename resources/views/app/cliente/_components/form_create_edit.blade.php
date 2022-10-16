@if(isset($cliente->id))
    <form action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}" method="post">
        @method('PUT')
        @else
            <form action="{{ route('cliente.store') }}" method="post">
                @endif
                @csrf
                <input type="text" name="nome" value="{{ $cliente->nome ?? old('nome') }}"
                       placeholder="Nome" class="borda-preta">
                @if($errors->has('nome'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('nome') }}</div>
                @endif
                <button type="submit" class="borda-preta">
                    @if(isset($cliente->id))
                        Editar
                    @else
                        Cadastrar
                    @endif
                </button>
                @if(isset($msg) && !$errors->any())
                    <div class="alert alert-success" role="alert">{{ $msg }}</div>
                @endif
            </form>
