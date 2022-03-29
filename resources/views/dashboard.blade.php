<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <a href="{{route('movies.create')}}">Add Movie</a>
        <a href="{{route('movies.reorder')}}">Reorder Movies</a>

    </x-slot>

    <div class="m-5">
    <h1 class="text-4xl bold text-center">Movie List</h1>
    @foreach ($categories as $cat)
        <h2 class="text-3xl bold">{{$cat->name}}</h2>
        <table>
            <tr>
                <th>Rank</th>
                <th>Title</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Move Up</th>
                <th>Move Down</th>
            </tr>
            @foreach($cat->movies as $movie)
                <tr>
                    <td>{{$movie->rank}}</td>
                    <td>{{$movie->title}}</td>
                    <td><a href="{{route('movies.edit', $movie->id)}}"> Edit </a></td>
                    <td>
                        <form action="{{route('movies.destroy',$movie->id)}}", method="post">
                            @method('delete')
                            @csrf
                            <button class="button">Delete</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('movie.up', $movie->id)}}" method="post">
                            @method('put')
                            @csrf
                            <button>Move Up</button>
                        </form>
                    </td>
                    <td>
                    <form action="{{route('movie.down', $movie->id)}}" method="post">
                            @method('put')
                            @csrf
                            <button>Move Down</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </table>
        @endforeach
</div>
</x-app-layout>
