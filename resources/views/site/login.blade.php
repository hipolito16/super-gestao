@extends('site.layouts.basico')

@section('titulo', 'Home')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>
        <div class="informacao-pagina">
            <form action="{{ route('site.login') }}" method="post">
                <div class="width30center">
                    @csrf
                    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="borda-preta {{ $errors->has('email') ? 'form-control is-invalid' : '' }}">
                    @if($errors->has('email'))
                        {{ $erro = '' }}
                        <div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
                    @endif
                    <input name="password" value="{{ old('password') }}" type="password" placeholder="Senha" class="borda-preta {{ $errors->has('password') ? 'form-control is-invalid' : '' }}">
                    @if($errors->has('password'))
                        {{ $erro = '' }}
                        <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
                    @endif
                    <button type="submit" class="borda-preta">Acessar</button>
                    @if(isset($erro) && $erro != '')
                        <div class="alert alert-danger mt-2" role="alert">{{ $erro }}</div>
                    @endif
                </div>
            </form>

        </div>
    </div>
    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection
