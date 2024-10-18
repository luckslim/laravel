@extends('layout.layout')
@section('titulo','Login com carrinho de compras')
@section('conteudo')
    <h1>Aqui é meu cadastro</h1>
    @if($mensagem=Session::get('erro'))
        {{$mensagem}}
    @endif
    @if($errors->any())
        @foreach ($errors->all() as $error)
            {{$error}}</br>
        @endforeach
    @endif
    <form action="{{route('users.store')}}" method="post">
        @csrf
        nome: <input name="firstName">
        sobrenome: <input name="lastName">
        email: <input name="email">
        senha: <input name="password">
        <button type="submit">Entrar</button>
    </form>
@endsection