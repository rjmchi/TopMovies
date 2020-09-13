@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="post" action={{route('store.movie',$movie->id)}}>
        @csrf
        <div class="form-group" style="width:25%">
                <select class="form-control" name="classification">
                    @foreach ($classifications as $classification)
                        <option value="{{$classification->id}}" {{$classification_id==$movie->classification_id? 'selected="selected"'}}>{{$classification->name}}</option>
                    @endforeach
                    </select>            
                </div>
    
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{$movie->name}}">
            </div>
    
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
    
            <div class="form-group" style="width:25%">
                    <label for="rank">Rank</label>
                    <input type="text" class="form-control" name="rank">
                </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
