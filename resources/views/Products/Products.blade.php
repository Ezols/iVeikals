@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Products
                    <a href="{{ route('products.addnew') }}" class="btn btn-sm btn-default pull-right">Add</a>
                </div>

                <div class="card-body">
                Ielikt tabulu
                   <table class="table">
                        <tr>
                            <th></th>
                        </tr>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
