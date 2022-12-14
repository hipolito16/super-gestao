@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor{{ $titulo ?? '' }}</p>
        </div>
        @include('app.fornecedor._partials.menu')
        <div class="informacao-pagina">
            <div class="width30center">
                <form action="{{ route('app.fornecedor.adicionar') }}" method="post">
                    <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">
                    @csrf
                    <input type="text" name="nome" value="{{ $fornecedor->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
                    @if($errors->has('nome'))
                        <div class="alert alert-danger" role="alert">{{ $errors->first('nome') }}</div>
                    @endif
                    <input type="text" name="site" value="{{ $fornecedor->site ?? old('site') }}" placeholder="Site" class="borda-preta">
                    @if($errors->has('site'))
                        <div class="alert alert-danger" role="alert">{{ $errors->first('site') }}</div>
                    @endif
                    <input type="text" name="uf"value="{{ $fornecedor->uf ?? old('uf') }}"  placeholder="UF" class="borda-preta">
                    @if($errors->has('uf'))
                        <div class="alert alert-danger" role="alert">{{ $errors->first('uf') }}</div>
                    @endif
                    <input type="text" name="email"value="{{ $fornecedor->email ?? old('email') }}"  placeholder="Email" class="borda-preta">
                    @if($errors->has('email'))
                        <div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
                    @endif
                    <button type="submit" class="borda-preta">Adicionar</button>
                    @isset($msg)
                        <div class="alert alert-success mt-2" role="alert">{{ $msg }}</div>
                    @endisset
                </form>
            </div>
        </div>
    </div>
@endsection
