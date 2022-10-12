@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor{{ $titulo ?? ''}}</p>
        </div>
        @include('app.fornecedor._partials.menu')
        <div class="informacao-pagina">
            <div class="width90center">
                <table class="table table-striped border mt-5 w-100">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Site</th>
                        <th>UF</th>
                        <th>Email</th>
                        <th colspan="2">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fornecedores as $fornecedor)
                        <tr>
                            <td>{{ $fornecedor->nome }}</td>
                            <td>{{ $fornecedor->site }}</td>
                            <td>{{ $fornecedor->uf }}</td>
                            <td>{{ $fornecedor->email }}</td>
                            <td align="right"><a class="icofont-ui-edit text-decoration-none"
                                                 href="{{ route('app.fornecedor.editar' , $fornecedor->id) }}"></a></td>
                            <td align="left"><a class="icofont-ui-delete text-decoration-none"
                                                href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}"></a></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p>Lista de Produtos</p>
                                <table class="table table-striped border mt-5 w-100">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($fornecedor->produto as $key => $produto)
                                        <tr>
                                            <td>{{ $produto->id ?? '' }}</td>
                                            <td>{{ $produto->nome ?? '' }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="list-paginate">
                    {{ $fornecedores->appends($request)->links() }}
                </div>
                <a href="{{ route('app.fornecedor') }}" class="btn btn-primary mt-3">Nova Consulta</a>
            </div>
        </div>
    </div>
@endsection
