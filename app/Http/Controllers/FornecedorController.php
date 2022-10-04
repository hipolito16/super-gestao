<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->paginate(10);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request, $msg = null)
    {
        // inclusão
        if ($request->input('_token') != '' && $request->input('id') == '') {
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
            $fornecedor->create($request->only(['nome', 'site', 'uf', 'email']));

            $msg = 'Fornecedor adicionado';
        }

        // edição
        if ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->only(['nome', 'site', 'uf', 'email']));
            $msg = 'Fornecedor editado';

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        };

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = null)
    {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id)
    {
        $fornecedor = Fornecedor::des($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor]);
    }
}
