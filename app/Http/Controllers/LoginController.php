<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index() {
        return view('site.login', ['titulo' => 'Login']);
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
            echo 'Usuário existe';
        } else {
            return redirect()->route('site.login');
        }

        print_r($request->all());
    }
}
