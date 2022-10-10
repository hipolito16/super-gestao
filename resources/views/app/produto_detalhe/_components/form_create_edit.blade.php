@if(isset($produto_detalhe->id))
    <form action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}" method="post">
        @method('PUT')
        @else
            <form action="{{ route('produto-detalhe.store') }}" method="post">
                @endif
                @csrf
                <input type="text" name="produto_id" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}"
                       placeholder="ID do produto" class="borda-preta">
                @if($errors->has('produto_id'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('produto_id') }}</div>
                @endif
                <input type="text" name="comprimento"
                       value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" placeholder="Comprimento"
                       class="borda-preta">
                @if($errors->has('comprimento'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('comprimento') }}</div>
                @endif
                <input type="text" name="largura" value="{{ $produto_detalhe->largura ?? old('largura') }}"
                       placeholder="Largura" class="borda-preta">
                @if($errors->has('largura'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('largura') }}</div>
                @endif
                <input type="text" name="altura" value="{{ $produto_detalhe->altura ?? old('altura') }}"
                       placeholder="Altura" class="borda-preta">
                @if($errors->has('altura'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('altura') }}</div>
                @endif
                <select name="unidade_id" class="borda-preta">
                    <option value="">Selecione</option>
                    @foreach($unidades as $unidade)
                        <option
                            value="{{ $unidade->id }}" {{ $produto_detalhe->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}</option>
                    @endforeach
                </select>
                @if($errors->has('unidade_id'))
                    <div class="alert alert-danger"
                         role="alert">{{ $errors->first('unidade_id') }}</div>
                @endif
                <button type="submit" class="borda-preta">
                    @if(isset($produto_detalhe->id))
                        Editar
                    @else
                        Cadastrar
                    @endif
                </button>
                @if(isset($msg))
                    <div class="alert alert-success" role="alert">{{ $msg }}</div>
                @endif
            </form>
