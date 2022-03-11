@extends('includes.header')
@section("title","Info")
<body>
<div class="container h-50 movie-info">
    @if($data)
        @foreach($data as $item)
            <p><h2>Movie Title</h2>{{$item['title']}}</p>
            <p><h2>Overview</h2>{{$item['overview']}}</p>
            <p><h2>Popularity</h2>{{$item['popularity']}}</p>
            <p><h2>Vote average</h2>{{$item['vote_average']}}</p>
            @if(isset($item['check']))
                <p><h2>Check</h2>{{$item['check']}}</p>
            @endif
        @endforeach
    @endif
</div>
</body>
