@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>
        @include('app.fornecedor._partials.menu')
        <div class="informacao-pagina">
            <div class="width-30-mlr">
                ... Lista ...
            </div>
        </div>
    </div>
@endsection
