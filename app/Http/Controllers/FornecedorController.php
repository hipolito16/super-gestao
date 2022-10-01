<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar()
    {
        return view('app.fornecedor.index');
    }

    public function adicionar(Request $request)
    {
        if ($request->input('_token') != '' ) {
            // validação
            $regras = [
                'nome' => 'required|min:3|max:40|unique:fornecedores',
                'site' => 'required|unique:fornecedores',
                'uf' => 'required|min:2|max:2',
                'email' => 'required|email|unique:fornecedores'
            ];

            $feedback = [
                'required' => ':Attribute obrigatório',
                'uf.required' => 'UF obrigatório',
                'unique' => ':Attribute já existente',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo uf só pode ter 2 caracteres',
                'uf.max' => 'O campo uf só pode ter 2 caracteres',
                'email.email' => 'Email inválido'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->only(['nome', 'site', 'uf' , 'email']));

            return view('app.fornecedor.adicionar', ['success' => 'true']);
        }

        return view('app.fornecedor.adicionar');
    }
}
