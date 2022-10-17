@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            @if(isset($pedido->id))
                <p>Editar Pedido</p>
            @else
                <p>Adicionar Pedido</p>
            @endif
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="{{ route('pedido.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 40%; margin-left: auto; margin-right: auto">
                @component('app.pedido._components.form_create_edit', ['pedido' => $pedido ?? null, 'clientes' => $clientes, 'msg' => $_GET['msg'] ?? null])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
