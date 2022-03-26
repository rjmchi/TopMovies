<x-guest-layout>
<h1 class="text-4xl bold text-center">Movie List</h1>
@foreach ($categories as $cat)
    <h2 class="text-3xl bold">{{$cat->name}}</h2>
    @foreach($cat->movies as $movie)
        <p class="ml-5">{{$movie->rank}} &mdash; {{$movie->title}}</p>
    @endforeach
@endforeach
</x-guest-layout>