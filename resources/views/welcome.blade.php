<x-guest-layout>
    <h1 class="text-4xl text-center bold">Movie List</h1>
    @foreach ($categories as $cat)
        <h2 class="text-3xl bold">{{ $cat->name }}</h2>
        @foreach ($cat->movies as $movie)
            <p class="ml-5">{{ $movie->rank }} &mdash; {{ $movie->title }}</p>
        @endforeach
    @endforeach

    <div class="ml-4 text-sm text-center text-gray-500 sm:text-right sm:ml-0">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </div>
</x-guest-layout>
