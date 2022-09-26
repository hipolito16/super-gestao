<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);

    }

    public function salvar(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'required:email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'nome.required' => 'Campo nome é obrigatório',
            'nome.min' => 'Nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'Nome deve ter no máximo 40 caracteres',
            'nome.unique' => 'Nome já existente',
            'telefone.required' => 'Campo telefone é obrigatório',
            'email.required' => 'Campo email é obrigatório',
            'email.email' => 'E-mail inválido',
            'motivo_contatos_id.required' => 'Campo motivo do contato é obrigatório',
            'mensagem.required' => 'Campo mensagem é obrigatório',
            'mensagem.max' => 'Mensagem deve ter no máximo 2000 caracteres'

            // 'required' => 'O campo :attributes é obrigatório'
            // Forma universal de utilizar para todos required
        ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
