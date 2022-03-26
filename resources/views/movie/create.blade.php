<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <h1 class="text-4xl bold text-center">Add Movie</h1>
    <form action="{{route('movies.store')}}" method="post">
        @csrf
        <label for="cat">Choose Category</label>
        <select name="category">
        @foreach ($categories as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
        </select>
        <label for="title">Title: </label>
        <input type="text" name="title">
        <label for="description">Description: </label>
        <textarea name="description"></textarea>
        <label for="rank">Rank: </label>
        <input type="text" name="rank">
        <button class="button">Add Movie</button>
    </form>
</x-app-layout>
