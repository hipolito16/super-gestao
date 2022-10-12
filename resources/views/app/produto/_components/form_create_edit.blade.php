@if(isset($produto->id))
    <form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="post">
        @method('PUT')
        @else
            <form action="{{ route('produto.store') }}" method="post">
                @endif
                @csrf
                <select name="fornecedor_id" class="borda-preta">
                    <option value="">Selecione um Fornecedor</option>
                    @foreach($fornecedores as $fornecedor)
                        <option
                            value="{{ $fornecedor->id }}" {{ ($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : '' }}>{{  $fornecedor->nome }}</option>
                    @endforeach
                </select>
                @if($errors->has('fornecedor_id'))
                    <div class="alert alert-danger"
                         role="alert">{{ $errors->first('fornecedor_id') }}</div>
                @endif
                <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}"
                       placeholder="Nome" class="borda-preta">
                @if($errors->has('nome'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('nome') }}</div>
                @endif
                <input type="text" name="descricao"
                       value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descrição"
                       class="borda-preta">
                @if($errors->has('descricao'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('descricao') }}</div>
                @endif
                <input type="text" name="peso" value="{{ $produto->peso ?? old('peso') }}"
                       placeholder="Peso" class="borda-preta">
                @if($errors->has('peso'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('peso') }}</div>
                @endif
                <select name="unidade_id" class="borda-preta">
                    <option value="">Selecione a Unidade de Medida</option>
                    @foreach($unidades as $unidade)
                        <option
                            value="{{ $unidade->id }}" {{ $produto->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}</option>
                    @endforeach
                </select>
                @if($errors->has('unidade_id'))
                    <div class="alert alert-danger"
                         role="alert">{{ $errors->first('unidade_id') }}</div>
                @endif
                <button type="submit" class="borda-preta">
                    @if(isset($produto->id))
                        Editar
                    @else
                        Cadastrar
                    @endif
                </button>
                @if(isset($msg) && !$errors->any())
                    <div class="alert alert-success" role="alert">{{ $msg }}</div>
                @endif
            </form>
