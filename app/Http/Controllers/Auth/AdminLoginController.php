<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    //Validação verificando se o usuário digitou ou não o usuário e a senha

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required',
        ]);

        //Verificando se o que o usuário digitou esta de acordo com a base de dados

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        //Caso tudo esteja Ok o admin entrará aonde ele quer ou vai cair direto no admin.dashboard

        $authOK = Auth::guard('admin')->attempt($credentials, $request->remember);

        if ($authOK){
            return redirect()->intended(route(('admin.dashboard')));
        }

        return redirect()->back()->withInputs($request->only('email','remember'));

    }

    public function index() {
        return view("auth.admin-login");
    }
}
