@extends('layout.layout')
@section('titulo','Login com carrinho de compras')
@section('conteudo')
@if($mensagem= Session::get('sucesso'))
{{$mensagem}}
@endif
<div class="container mt-5">
    <h2 class="mb-4">Carrinho de Compras</h2>
    <p>{{$itens->count()}} Produtos.</p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($itens as $item)
            <tr>
                <td><img width="70" src="{{$item->attributes->image}}" alt=""></td>
                <td>{{$item->quantity}}</td>
                <td>R${{$item->price}}</td>
                <td>
                    
                    <form action="{{route('site.removecarrinho')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h5>valor total: R${{number_format(\Cart::getTotal(),2,',','.')}}</h5>
    <a href="{{route('site.limparcarrinho')}}">Limpar Carrinho</a>
    <button class="btn btn-primary mt-3">Finalizar Compra</button>
</div>
@endsection