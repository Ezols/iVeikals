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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
