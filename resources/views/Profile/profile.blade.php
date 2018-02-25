@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="/uploads/avatars/{{ $user->avatar }}" alt="Card image cap">
                <div class="card-body">
                    <form enctype="multipart/form-data" action="/profile" method="POST">
                        @csrf
                        @include('partials.inputs.file', ['name' => 'avatar', 'hideLabel' => true])
                        <input type="submit" class="float-right btn btn-sm btn-primary" value="Change picture" >
                    </form>
                </div>
            </div>      
        </div>

        <div class="col-md-8">               
            <h2>{{ $user->name }} Profile</h2>
            asdasdasda
        </div>    
    </div>    
</div>
@endsection
