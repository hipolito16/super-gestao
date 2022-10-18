<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        $pedido->produto;
        return view('app.pedido_produto.form', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        self::regrasAndFeedback($regras, $feedback);
        $request->validate($regras, $feedback);


//        $pedidoProduto = new PedidoProduto();
//        $pedidoProduto->pedido_id = $pedido->id;
//        $pedidoProduto->produto_id = $request->get('produto_id');
//        $pedidoProduto->quantidade = $request->get('quantidade');
//        $pedidoProduto->save();

        $pedido->produto()->attach($request->get('produto_id'), ['quantidade' => $request->get('quantidade')]);

        if (!isset($errors)) {
            $msg = "Produto adicionado ao pedido com sucesso!";
        } else {
            $msg = null;
        }

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id, 'msg' => $msg]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoProduto $pedidoProduto, Pedido $pedido_id)
    {
        $pedidoProduto->delete();
        if (!isset($errors)) {
            $msg = "Produto excluído do pedido com sucesso!";
        } else {
            $msg = null;
        }
        return redirect()->route('pedido-produto.create', ['pedido' => $pedido_id->id, 'msg' => $msg]);
    }

    public static function regrasAndFeedback(&$regras, &$feedback)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required|numeric|min:1',
        ];

        $feedback = [
            'produto_id.exists' => 'O produto informado não existe',
            'quantidade.required' => 'A quantidade é obrigatória',
            'quantidade.numeric' => 'A quantidade deve ser numérica',
            'quantidade.min' => 'A quantidade deve ser maior que zero'
        ];
    }
}
