@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Thank you for your purchase!</h2>
                </div>

                <div class="card-body">
                    <h4>Do you want to create account in our online shop?</h4>
                    <a href="/register" class="btn btn-success">Create account</a>
                    <a class="btn btn-secondary" href="{{route('home')}}">No, thank you</a>
                </div>           
            </div>
        </div>
    </div>
</div>   

     
@endsection



