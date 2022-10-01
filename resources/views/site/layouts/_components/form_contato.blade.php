{{ $slot }}
<form action="{{ route('site.contato') }}" method="post" class="{{ isset($classe_contato) ? $classe_contato : '' }}">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome"
           class="{{ $classe }} {{ $errors->has('nome') ? 'form-control is-invalid' : '' }}">
    @if($errors->has('nome'))
        <div class="alert alert-danger" role="alert">{{ $errors->first('nome') }}</div>
    @endif
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone"
           class="{{ $classe }} {{ $errors->has('telefone') ? 'form-control is-invalid' : '' }}">
    @if($errors->has('telefone'))
        <div class="alert alert-danger" role="alert">{{ $errors->first('telefone') }}</div>
    @endif
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail"
           class="{{ $classe }} {{ $errors->has('email') ? 'form-control is-invalid' : '' }}">
    @if($errors->has('email'))
        <div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
    @endif
    <select name="motivo_contatos_id" value="{{ old('motivo_contatos_id') }}"
            class="{{ $classe }} {{ $errors->has('motivo_contatos_id') ? 'form-control is-invalid' : '' }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach($motivo_contatos as $key => $motivo_contato)
            <option
                value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>{{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
    @if($errors->has('motivo_contatos_id'))
        <div class="alert alert-danger" role="alert">{{ $errors->first('motivo_contatos_id') }}</div>
    @endif
    <textarea name="mensagem" class="{{ $classe }} {{ $errors->has('mensagem') ? 'form-control is-invalid' : '' }}"
              placeholder="Preencha aqui a sua mensagem">{{ old('mensagem') }}</textarea>
    @if($errors->has('mensagem'))
        <div class="alert alert-danger" role="alert">{{ $errors->first('mensagem') }}</div>
    @endif
    <button type="submit" class="{{ $classe }}">Enviar</button>
</form>
