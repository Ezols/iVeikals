@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Products
                    <a href="{{ route('products') }}" class="btn btn-sm btn-default pull-right">Cancel</a>
                </div>

                <div class="card-body">
                    <form action="{{  route('products.submit') }}" enctype='multipart/form-data' method='post'>
                    {{ csrf_field() }}

                        @include('partials.inputs.text', ['name' => 'title', 'label' => 'Title'])
                        @include('partials.inputs.text', ['name' => 'weight', 'label' => 'Weight'])
                        @include('partials.inputs.select', ['name' => 'unit', 'label' => 'Unit', 'options' => $units])
                        @include('partials.inputs.text', ['name' => 'price', 'label' => 'Price'])
                        @include('partials.inputs.file', ['name' => 'img', 'label' => 'Picture'])
                        @include('partials.inputs.date', ['name' => 'manufacturing_date', 'label' => 'Manufacturing date'])
                        @include('partials.inputs.date', ['name' => 'best_before_date', 'label' => 'Best before date'])

                        <button class="btn btn-primary" type="submit" name="submit">Add</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
