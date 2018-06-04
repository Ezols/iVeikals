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
                        <th>Weight</th>
                        <th>Unit</th>   
                        <th>Price</th>
                        <th>Image</th>
                        <th>Manufacturing date</th>
                        <th>Use till date</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>

                @foreach($cartProducts as $product)    
                    <tr>
                        <td>{{ $product['title'] }}</td>
                        <td>{{ $product['weight'] }}</td>
                        <td>{{ $product['unit'] }}</td>
                        <td>{{ $product['price'] }} €</td>
                        <td>
                            @if($product['img'])
                                <img src="/uploads/products/thumbnail/{{$product['img']}}">
                            @endif
                        </td>
                        <td>{{ $product['manufacturing_date'] }}</td>
                        <td>{{ $product['best_before_date'] }}</td>
                        <td>{{ $product['quantity'] }}</td>
                        <td>
                            <form action="{{ route('product.removeFromCart')}}" method='post'>
                                {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $product['id'] }}">
                            {{-- <input type="submit" value="delete"> --}}
                            <button class="btn btn-dark float-right"><i class="fas fa-trash-alt"></i></button>                     
                            </form>  
                        </td>
                    </tr>
                @endforeach
                </table>
                <div class="col-xs-12"><hr></div>
                <div class="pb-3 pl-3">
                    <a class="btn btn-outline-success my-2 my-sm-0" href="{{route('product.checkout')}}">Proceed to checkout</a> 
                </div>
               
                <div class="cart-total text-right">
                    @if(isset($finalCartPrice))
                        total : {{$finalCartPrice}} €
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
