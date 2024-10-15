@extends('layout.layout')
@section('titulo','Login com carrinho de compras')
@section('conteudo')
    <h1>Aqui é meu conteudo da home </h1>
    @if($mensagem=Session::get('erro'))
        {{$mensagem}}
    @endif
    @if($errors->any())
        @foreach ($errors->all() as $error)
            {{$error}}</br>
        @endforeach
    @endif
    <form action="{{route('login.auth')}}" method="post">
        @csrf
        login: <input name="email">
        senha: <input name="password">
        <button type="submit">Entrar</button>
    </form>
@endsection