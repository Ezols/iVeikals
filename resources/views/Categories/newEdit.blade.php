@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <a href="{{ route('categories') }}" class="btn btn-primary float-right">Cancel</a>
                    <h2>{{ $categorie->title }}</h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('categories.submit', $categorie->id) }}" method="POST">
                        @csrf
                        @include('partials.inputs.text', ['name' => 'title', 'label' => 'Title', 'value' => $categorie->title])

                        <button class="btn btn-primary" type="submit" name="Submit">
                            @if($id)
                                Update
                            @else
                                Add
                            @endif
                        </button>

                        @if($id)
                            <a class="btn btn-danger pull-right" href="{{ route('categories.delete', $categorie->id) }}"
                                    onclick="event.preventDefault();document.getElementById('delete-form').submit();">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    Delete
                            </a>
                        @endif
                    </form>

                    <form id="delete-form" action="{{ route('categories.delete', $categorie->id) }}"
                            method="POST" style="display: none;">
                            {{ csrf_field() }}
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection