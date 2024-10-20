@extends('layout.layout')
@section('titulo','Login com carrinho de compras')
@section('conteudo')
<h1>Aqui é a para vizualizar produtos!</h1>
<img src="{{$produto->imagem}}" alt="">
<p>{{$produto->nome}}</p>
<p>{{$produto->preco}}</p>
@endsection