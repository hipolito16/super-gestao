@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Clientes</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div class="width90center">
                <table class="table table-striped border mt-5 w-100">
                    <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th colspan="3">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome }}</td>
                            <td align="right">
                                <a class="icofont-exclamation-circle text-decoration-none"
                                   href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}"></a>
                            </td>
                            <td align="center">
                                <a class="icofont-ui-edit text-decoration-none"
                                   href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}"></a>
                            </td>
                            <td align="left">
                                <form id="form_{{ $cliente->id }}" method="post" action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{ $cliente->id }}').submit()" class="icofont-ui-delete text-decoration-none"></a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="list-paginate">
                    {{ $clientes->appends($request)->links() }}
                </div>
            </div>
            @isset($_GET['msg'])
                <div class="alert alert-info width30center" role="alert">{{ $_GET['msg'] }}</div>
            @endisset
        </div>
    </div>
@endsection
