@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Produtos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="">Novo Consulta</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div class="width90center">
                <table class="table table-striped border mt-5 w-100">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Peso</th>
                        <th>Unidade ID</th>
                        <th colspan="2">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ $produto->peso }}</td>
                            <td>{{ $produto->unidade_id }}</td>
                            <td align="right"><a href=""><i
                                        class="icofont-ui-edit"></i></a></td>
                            <td align="left"><a href=""><i
                                        class="icofont-ui-delete"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="list-paginate">
                    {{ $produtos->appends($request)->links() }}
                </div>
                <a href="" class="btn btn-primary mt-3">Nova Consulta</a>
            </div>
        </div>
    </div>
@endsection
