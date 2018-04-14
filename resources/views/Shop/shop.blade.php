@extends('layouts.app')

@section('content')

<div class="container">
    <div class="jumbotron text-center">
        <div class="container">
            <h1>Ieliec reklamu, dabusi piķiiti</h1>
            <p class="lead">$$$</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="card card-default">
                <div class="card-header">                   
                    <h2>Shop</h2>
                </div>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-sm-4">
                            <div class="card m-2">
                                @if($product->img) 
                                        <img src="/uploads/products/shop/{{$product->img}}">
                                @endif<br>
                                <div class="card-body">
                                <h5 class="card-title title">{{ $product->title }}</h5>
                                <p class="card-text description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <div class="float-left price">
                                        {{ $product->price }} €
                                    </div>
                                
                                <form action="{{ route('product.addToCart') }}" method='post'>
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <button class="btn btn-success float-right">Add to <i class="fas fa-shopping-cart"></i></button>
                                </form>

                                </div>
                            </div>                            
                        </div>
                    @endforeach  
                </div>
            </div>   
            <div class="link buttons m-2">
                {{ $products->links() }}     
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3">
                Filter: 
                <ul class="list-unstyled m-2">
                   <li><a href="/category_id=2">Elektronika</a></li>
                   <li><a href="/category_id=6">Datori</a></li> 
                   <li><a href="{{ route('home') }}">Reset</a></li>
                </ul>
                Filter2: 
                <form method="GET" action="">
                    <select name="option">
                        <Option value="Elektronika">Elektronika</Option>
                        <Option value="Datori">Datori</Option>
                    </select>

                    <button type="submit">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
