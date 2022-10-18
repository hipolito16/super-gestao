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
                <h4>Itens do Pedido</h4>
                <table class="table table-striped border mt-5 w-100">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Produto</th>
                        <th>Quantiade</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pedido->produto as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->pivot->quantidade }}</td>
                            <td>
                                <form id="form_{{ $produto->pivot->id }}" method="post" action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id, 'pedido_id' => $pedido->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{ $produto->pivot->id }}').submit()" class="icofont-ui-delete text-decoration-none"></a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @component('app.pedido_produto._components.form_create_edit', ['pedido' => $pedido ?? null, 'produtos' => $produtos, 'msg' => $_GET['msg'] ?? null])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
