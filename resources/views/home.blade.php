@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

   <p> <a href="movies/create" class="btn btn-primary">New Movie</a></p>
</div>

<div id="app">
    <tabledraggable-component :classifications="{{$classifications}}"></tabledraggable-component>
</div>
@endsection
