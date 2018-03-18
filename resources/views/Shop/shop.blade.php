<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                   
                    <h2>Title</h2>

                </div>

                <div class="container-fluid">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-4">     
                                {{ $product->title }}<br>

                                @if($product->img) 
                                    <img src="/uploads/products/shop/{{$product->img}}">
                                @endif
                                Price: {{ $product->price }} €
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
@endsection
