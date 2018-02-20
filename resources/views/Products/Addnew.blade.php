@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Products
                    <a href="" class="btn btn-sm btn-default pull-right">Cancel</a>
                </div>

                <div class="card-body">
                    <form action="{{  route('products.submit') }}" enctype='multipart/form-data' method='post'>
                    {{ csrf_field() }}

                        @include('partials.inputs.text', ['name' => 'title', 'label' => 'Title'])

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
