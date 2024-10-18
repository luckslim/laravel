<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request){
        $credenciais = $request->validate([
            'email'=>['required','email'],
            'password'=>['required'],
        ],
        [
            'email.required'=>'o campo email é obrigatorio!',
            'email.email'=>'o email nao é valido!',
            'password.required'=>'o campo senha é obrigatorio!',
        ]
    
        );
        if(Auth::attempt($credenciais, $request->remember)){
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');

        }else{
            return redirect()->back()->with('erro','email ou senha invalida!');
        }

    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('site.index'));
    }
    public function create(){
        return view('create');
    }
}
