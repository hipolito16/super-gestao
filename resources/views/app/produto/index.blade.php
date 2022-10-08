@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Produtos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div class="width90center">
                <table class="table table-striped border mt-5 w-100">
                    <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Peso</th>
                        <th>Unidade de Medida</th>
                        <th colspan="3">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ $produto->peso }}</td>
                            <td>{{ \App\Http\Controllers\ProdutoController::searchDescricaoByIdInUnidade($produto->unidade_id) }}</td>
                            <td align="right">
                                <a class="icofont-exclamation-circle text-decoration-none"
                                   href="{{ route('produto.show', ['produto' => $produto->id]) }}"></a>
                            </td>
                            <td align="center">
                                <a class="icofont-ui-edit text-decoration-none"
                                   href="{{ route('produto.edit', ['produto' => $produto->id]) }}"></a>
                            </td>
                            <td align="left">
                                <form id="form_{{ $produto->id }}" method="post" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{ $produto->id }}').submit()" class="icofont-ui-delete text-decoration-none"></a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="list-paginate">
                    {{ $produtos->appends($request)->links() }}
                </div>
            </div>
            @isset($_GET['msg'])
                <div class="alert alert-info width30center" role="alert">{{ $_GET['msg'] }}</div>
            @endisset
        </div>
    </div>
@endsection
