@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produto - Visualizar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto">
                <table class="table table-striped border mt-5 w-100">
                    <thead class="table-dark">
                    <tr>
                        <td>Coluna</td>
                        <td>Valor</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $produto->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>{{ $produto->nome }}</td>
                    </tr>
                    <tr>
                        <td>Descrição</td>
                        <td>{{ $produto->descricao }}</td>
                    </tr>
                    <tr>
                        <td>Peso</td>
                        <td>{{ $produto->peso }}</td>
                    </tr>
                    <tr>
                        <td>Unidade de Medida</td>
                        <td>{{ $produto->unidade->descricao }}</td>
                    </tr>
                    </tbody>
                </table>
                <a class="btn btn-primary" href="{{ route('produto.index') }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection
