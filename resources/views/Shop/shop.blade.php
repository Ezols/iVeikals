<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">                   
                    <h2>Shop</h2>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-sm-3">
                                <div class="card mt-3">
                                    @if($product->img) 
                                            <img src="/uploads/products/shop/{{$product->img}}">
                                    @endif<br>
                                    <div class="card-body">
                                    <h5 class="card-title title">{{ $product->title }}</h5>
                                    <p class="card-text description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                        <div class="float-left price">
                                            {{ $product->price }} €
                                        </div>
                                    <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-success float-right">Add to <i class="fas fa-shopping-cart"></i></a>
                                    </div>
                                </div>                            
                            </div>
                        @endforeach  
                    </div>
                </div>
            </div>                
        </div>
    </div>
</div>
@endsection
