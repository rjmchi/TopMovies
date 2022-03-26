<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <h1 class="text-4xl bold text-center">Add Movie</h1>
    <form action="{{route('movies.update', $movie->id)}}" method="post">
        @csrf
        @method('put')
        <label for="title">Title: </label>
        <input type="text" name="title" value="{{$movie->title}}">
        <label for="description">Description: </label>
        <textarea name="description">{{$movie->description}}</textarea>
        <label for="rank">Rank: </label>
        <input type="text" name="rank" value="{{$movie->rank}}">
        <button class="button">Save</button>
    </form>
</x-app-layout>
