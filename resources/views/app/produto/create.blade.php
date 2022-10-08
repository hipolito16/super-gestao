@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produto</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
                <div style="width: 30%; margin-left: auto; margin-right: auto">
                    <form action="{{ route('produto.store') }}" method="post">
                        @csrf
                        <input type="text" name="nome" placeholder="Nome" class="borda-preta">
                        {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                        <input type="text" name="descricao" placeholder="Descrição" class="borda-preta">
                        {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
                        <input type="text" name="peso" placeholder="Peso" class="borda-preta">
                        {{ $errors->has('peso') ? $errors->first('peso') : '' }}
                        <select name="unidade_id" class="borda-preta">
                            <option value="">Selecione</option>
                            @foreach($unidades as $unidade)
                                <option value="{{ $unidade->id }}">{{ $unidade->descricao }}</option>
                            @endforeach
                        {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
                        <button type="submit" class="borda-preta">Adicionar</button>
                    </form>
                </div>
        </div>
    </div>
@endsection
