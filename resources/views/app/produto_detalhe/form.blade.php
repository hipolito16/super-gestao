@extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            @if(isset($produto_detalhe->id))
                <p>Editar Detalhes do Produto</p>
            @else
                <p>Adicionar Detalhes do Produto</p>
            @endif
        </div>
        <div class="menu">
            <ul>
                <li><a href="#">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div class="width60center">
                @if(isset($produto_detalhe->id))
                    <h4 class="fw-bold">Produto</h4>
                    <div class="justify-content-center"><label class="fw-bold">Nome:</label> {{ $produto_detalhe->produto->nome }}</div>
                    <div class="justify-content-center"><label class="fw-bold">Descrição:</label> {{ $produto_detalhe->produto->descricao }}</div>
                @endif
            </div>
            <div class="width30center">
                @component('app.produto_detalhe._components.form_create_edit', ['unidades' => $unidades, 'produto_detalhe' => $produto_detalhe ?? null, 'msg' => $_GET['msg'] ?? null])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
