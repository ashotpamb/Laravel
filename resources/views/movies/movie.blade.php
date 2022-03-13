@extends('includes.index')

@section('title', 'Movie')

@section('content')
{{--    {{dd($result)}}--}}

    @php($mainImage = !empty($result['poster_path']) ? $result['poster_path'] : 'https://maxler.com/local/templates/maxler/assets/img/not-found.png')

    <div class="movie" style="background-image: url({{"https://image.tmdb.org/t/p/w1920_and_h800_multi_faces/$mainImage"}}); background-repeat: no-repeat">
        <div class="movie_poser">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="movie_img">
                            @if(empty($result['backdrop_path']))
                                <img class="" src="https://maxler.com/local/templates/maxler/assets/img/not-found.png" alt="">
                            @else
                                <img class="" src="https://image.tmdb.org/t/p/w300_and_h450_face/{{$result['backdrop_path']}}" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="movie_title">
                            <h2>{{$result['title']}}
                                @if(isset($result['release_date']))
                                    @php($resleaseDate = explode('-', $result['release_date'])[0])
                                    <small>({{$resleaseDate}})</small>
                                @endif
                            </h2>
                        </div>
                        <div class="movie_desc">
                            <p><b>@lang('Budget'):</b> <span>{{number_format($result['budget'], 2, ',')}}</span></p>
                        </div>
                        <div class="movie_desc">
                            <h3>@lang('Description')</h3>
                            <p>{{$result['overview']}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
