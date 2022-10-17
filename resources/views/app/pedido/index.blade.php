@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Pedidos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="{{ route('pedido.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div class="width90center">
                <table class="table table-striped border mt-5 w-100">
                    <thead class="table-dark">
                    <tr>
                        <th>ID Pedido</th>
                        <th>ID Cliente</th>
                        <th>Cliente</th>
                        <th colspan="3">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->cliente->nome }}</td>
                            <td><a class="text-decoration-none" href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">Adicionar Produtos</a></td>
                            <td align="right">
                                <a class="icofont-exclamation-circle text-decoration-none"
                                   href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}"></a>
                            </td>
                            <td align="center">
                                <a class="icofont-ui-edit text-decoration-none"
                                   href="{{ route('pedido.edit', ['pedido' => $pedido->id]) }}"></a>
                            </td>
                            <td align="left">
                                <form id="form_{{ $pedido->id }}" method="post" action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{ $pedido->id }}').submit()" class="icofont-ui-delete text-decoration-none"></a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="list-paginate">
                    {{ $pedidos->appends($request)->links() }}
                </div>
            </div>
            @isset($_GET['msg'])
                <div class="alert alert-info width30center" role="alert">{{ $_GET['msg'] }}</div>
            @endisset
        </div>
    </div>
@endsection
