@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <a href="{{ route('products.addnew') }}" class="btn btn-primary float-right">Add</a>
                    <h2>Products</h2>                   
                </div>


                   <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Category id</th>
                            <th>Title</th>
                            <th>Weight</th>
                            <th>Unit</th>   
                            <th>Price</th>
                            <th>Image</th>
                            <th>Manufacturing date</th>
                            <th>Use till date</th>
                            <th>Action</th>
                        </tr>

                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->category_id }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->weight }}</td>
                                <td>{{ $product->unit }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    @if($product->img)
                                        <img src="/uploads/products/thumbnail/{{$product->img}}">
                                    @endif
                                </td>
                                <td>{{ $product->manufacturing_date }}</td>
                                <td>{{ $product->best_before_date }}</td>
                                <td><a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary float-right">Edit</a></td>
                            </tr>
                        @endforeach
                   </table>
            </div>
        </div>
    </div>
</div>
@endsection
