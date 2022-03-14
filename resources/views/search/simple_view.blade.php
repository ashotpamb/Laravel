<h1>Movie list</h1>
@forelse($movies as $movie)
    <ul class="list-group text-center">
        <a href="{{route('show-movie', ['id' => $movie['id']])}}">{{$movie['title']}}</a>
    </ul>
@empty
@endforelse
