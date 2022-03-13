<div class="card col-lg-3 col-md-3 p-0 movie_card">
    <div class="movie_card-image">
        @if(empty($result['backdrop_path']))
            <img class="card-img-top" src="https://maxler.com/local/templates/maxler/assets/img/not-found.png" alt="">
        @else
            <img class="card-img-top" src="https://image.tmdb.org/t/p/w220_and_h330_face/{{$result['backdrop_path']}}" alt="">
        @endif
    </div>

    <div class="card-body">
        <div class="votes_average">
            {{$result['vote_average']}}
        </div>

        <h6 class="card-title item_title">
            <a href="{{route('show-movie', ['id' => $result['id']])}}">{{$result['title']}}</a>
        </h6>

{{--        @foreach($result as $key => $value)--}}
{{--            @if(!is_array($value))--}}
{{--            <p class="card-text">{{$key}} - {{$value}}</p>--}}
{{--            @endif--}}
{{--        @endforeach--}}
        <p class="item_release_date">{{$result['release_date'] ?? ''}}</p>

    </div>
</div>

