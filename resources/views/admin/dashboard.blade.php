@extends('layout.layout')
@section('titulo','Login com carrinho de compras')
@section('conteudo')
<nav class="navbar navbar-expand-lg bg-body-tertiary rounded" aria-label="Thirteenth navbar example">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
        <a class="navbar-brand col-lg-3 me-0" href="#">Bem Vindo {{auth()->user()->firstName}}</a>
        <ul class="navbar-nav col-lg-6 justify-content-lg-center">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('site.carrinho')}}">Carrinho</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Categorias</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <div class="d-lg-flex col-lg-3 justify-content-lg-end">
          <a href="{{route('login.logout')}}" class="btn btn-danger">logout</a>
        </div>
      </div>
    </div>
  </nav>
    <div class="div-cards">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($produtos as $produto)
            <div class="col">
                <div class="card shadow-sm">
                    <img  src="{{$produto->imagem}}" alt="">
                    <div class="card-body">
                    <h6>{{$produto->nome}}</h6>
                    <p class="card-text">{{$produto->descrição}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                        <form action="{{ route('site.addcarrinho') }}" method="post">
                          @csrf
                          <input type="hidden" name="id" value="{{$produto->id}}">
                          <input type="hidden" name="name" value="{{$produto->nome}}">
                          <input type="hidden" name="price" value="{{$produto->preco}}">
                          <input type="hidden" name="img" value="{{$produto->imagem}}">
                          <input type="number" name="qnt" value="1">
                          <button type="submit" class="btn btn-sm btn-outline-secondary">Add To Cart</button>
                        </form>
                        <a href="{{route('site.details', $produto->slug)}}"class="btn btn-sm btn-outline-secondary">View</a>
                        </div>
                        <small class="text-body-secondary">R${{$produto->preco}}</small>
                    </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div><br>
    <div class="container themed-container text-center">
      {{$produtos->links('custom.pagination')}}
    </div>
</nav>
@endsection