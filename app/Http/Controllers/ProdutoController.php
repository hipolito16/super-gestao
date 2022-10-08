<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;
use mysql_xdevapi\TableSelect;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(10);
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto.form', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        self::regrasAndFeedback($regras, $feedback);
        $request->validate($regras, $feedback);
        Produto::create($request->all());
        if (!isset($errors)) {
            $msg = "Produto cadastrado com sucesso!";
        } else {
            $msg = null;
        }
        return redirect()->route('produto.create', ['msg' => $msg]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        $unidade = Unidade::firstWhere('id', $produto->unidade_id);
        return view('app.produto.show', ['produto' => $produto, 'unidade' => $unidade]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Produto $produto)
    {
        $unidades = Unidade::all();
        return view('app.produto.form', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        self::regrasAndFeedback($regras, $feedback);
        $request->validate($regras, $feedback);
        $produto->update($request->all());
        if (!isset($errors)) {
            $msg = "Produto atualizado com sucesso!";
        } else {
            $msg = null;
        }
        return redirect()->route('produto.edit', ['produto' => $produto->id, 'msg' => $msg]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        $msg = "Produto excluído com sucesso!";
        return redirect()->route('produto.index', ['msg' => $msg]);
    }

    public static function searchDescricaoByIdInUnidade($id)
    {
        return Unidade::firstWhere('id', $id)->descricao;
    }

    public static function regrasAndFeedback(&$regras, &$feedback) {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'required|integer|exists:unidades,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'unidade_id.required' => 'O campo unidade de medida é obrigatório',
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'descricao.min' => 'O campo descrição precisa ter no mínimo 3 caracteres',
            'descricao.max' => 'O campo descrição pode ter no máximo 2000 caracteres',
            'peso.integer' => 'O campo peso precisa ser um número inteiro',
            'unidade_id.integer' => 'O campo unidade precisa ser um número inteiro',
            'unidade_id.exists' => 'A unidade informada não existe'
        ];
    }
}
