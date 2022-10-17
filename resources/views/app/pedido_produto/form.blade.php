@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produtos ao Pedido</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 40%; margin-left: auto; margin-right: auto">
                <h4>Detalhes do Pedido</h4>
                <p>ID do Pedido: {{ $pedido->id }}</p>
                <p>Cliente: {{ $pedido->cliente_id }}</p>
                <p>RETOMAR 9:00</p>
            </div>
        </div>
    </div>
@endsection
