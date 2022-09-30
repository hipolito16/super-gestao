<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request) {
        session_start();

        if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
            return redirect()->route('app.home');
        }

        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'Usuário ou senha inválido';
        }

        if ($request->get('erro') == 2) {
            $erro = 'Necessário realizar login para ter acesso a página';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request) {

        // regras de validação
        $regras = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        // as mensagens de feedback de validação
        $feedback = [
            'email.required' => 'Campo usuário é obrigatório',
            'email.email' => 'E-mail inválido',
            'password.required' => 'Campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        // recuperamos os parametros do usuário
        $email = $request->get('email');
        $password = $request->get('password');

        // iniciar o Model User
        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if (isset($usuario->name)) {
            session_start();

            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1])->withInput();
        }
    }

    public function sair() {
        session_destroy();

        return redirect()->route('site.login');
    }
}
