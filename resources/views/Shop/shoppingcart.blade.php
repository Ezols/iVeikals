@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Cart</h2>
                </div>

                <table class="table">
                    <tr>
                        <th>Product</th>
                        <th>Price €</th>
                        <th>Quantity</th>
                        <th>Buyer</th>
                    </tr>

                @foreach($products as $product)    
                    <tr>
                        {{ dd($product->title) }}

                    </tr>
                @endforeach
                </table>
            </div>
        </div>
    </div>
</div>    
@endsection
