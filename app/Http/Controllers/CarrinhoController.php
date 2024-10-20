<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista(){
        $itens = \Cart::getContent();
        // dd($itens);
        return view('site.carrinho', compact('itens'));
    }  
     public function adicionarCarrinho(Request $request){
        \Cart::add([
            'id'=>$request->id,
            'name'=>$request->name,
            'price'=>$request->price,
            'quantity'=>$request->qnt,
            'attributes'=> array(
                'image'=>$request->img
            )

        ]);
        return redirect()->route('site.carrinho')->with('sucesso', 'produto adicionado no carrinho com sucesso!');
     }
     public function removeCarrinho(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('site.carrinho')->with('sucesso', 'produto removido com sucesso!');
     }
     public function limparCarrinho(){
        \Cart::clear();
        return redirect()->route('site.carrinho')->with('sucesso', 'carrinho limpo com sucesso!');
     }
}
