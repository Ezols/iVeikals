@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{ $user->name }} Profile</h2>

            <form enctype="multipart/form-data" action="/profile" method="POST">
                @csrf
                <label>Update Profile Picture</label>
                @include('partials.inputs.file', ['name' => 'avatar', 'label' => 'Picture'])
                <input type="submit" class="float-right btn btn-sm btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
