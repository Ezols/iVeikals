@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <a href="{{ route('categories.newEdit') }}" class="btn btn-primary float-right">Add</a>
                    <h2>Categories</h2>                   
                </div>

                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                    </tr>       

                    @foreach($categories as $categorie)
                        <tr>
                            <td>{{ $categorie->id }}</td>
                            <td>{{ $categorie->title }}</td>
                            <td><a href="{{ route('categories.newEdit', $categorie->id) }}" class="btn btn-primary floar-right">Edit</a></td>
                        </tr>
                    @endforeach               
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
