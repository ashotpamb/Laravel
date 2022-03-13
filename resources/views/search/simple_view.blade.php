<h1>Movie list</h1>
@forelse($movies as $movie)
    <a href="{{route('show-movie', ['id' => $movie['id']])}}">{{$movie['title']}}</a>
@empty
@endforelse
