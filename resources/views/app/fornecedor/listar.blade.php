@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
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
                            <td align="right"><a href="{{ route('app.fornecedor.editar' , $fornecedor->id) }}"><i
                                        class="icofont-ui-edit"></i></a></td>
                            <td align="left"><a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}"><i
                                        class="icofont-ui-delete"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
{{--                <div class="list-paginate">{{ $fornecedores->links() }}</div>--}}
                <a href="{{ route('app.fornecedor') }}" class="btn btn-primary">Nova Consulta</a>
            </div>
        </div>
    </div>
@endsection
