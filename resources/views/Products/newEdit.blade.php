@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <a href="{{ route('products') }}" class="btn btn-danger float-right">Cancel</a>
                    <h2>{{ $product->title }}</h2>
                </div>
                <div class="card-body">
                    <form action="{{  route('products.submit', $product->id) }}" enctype='multipart/form-data' method='post'>
                        {{ csrf_field() }}

                        @include('partials.inputs.text', ['name' => 'title', 'label' => 'Title', 'value' => $product->title])
                        @include('partials.inputs.number', ['name' => 'weight', 'label' => 'Weight', 'value' => $product->weight])
                        @include('partials.inputs.select', ['name' => 'unit', 'label' => 'Unit', 'options' => $units, 'value' => $product->unit])
                        @include('partials.inputs.select', ['name' => 'category_id', 'label' => 'Category', 'options' => $categories])
                        @include('partials.inputs.text', ['name' => 'price', 'label' => 'Price', 'value' => $product->price])
                        @include('partials.inputs.file', ['name' => 'img', 'label' => 'Picture', 'value' =>  "/uploads/products/" . $product->img])
                        @include('partials.inputs.date', ['name' => 'manufacturing_date', 'label' => 'Manufacturing date', 'value' => $product->manufacturing_date])
                        @include('partials.inputs.date', ['name' => 'best_before_date', 'label' => 'Best before date', 'value' => $product->best_before_date])

                        <button class="btn btn-primary" type="submit" name="submit">
                            @if($id)
                                Update
                            @else
                                Add
                            @endif
                        </button>

                        @if($id)
                            <a class="btn btn-danger pull-right" href="{{ route('product.delete', $product -> id) }}"
                                    onclick="event.preventDefault();document.getElementById('delete-form').submit();">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    Delete
                            </a>
                        @endif
                        
                    </form>

                    <form id="delete-form" action="{{ route('product.delete', $product -> id) }}"
                            method="POST" style="display: none;">
                            {{ csrf_field() }}
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
