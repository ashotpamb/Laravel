@extends('includes.index')

@section('title', 'Movies')

@section('content')

    <div class="movies">
        @include('movies.search-input')
        <div class="container">
            <div class="row justify-content-center">
                @if(isset($data['info']))
                    <h3>{{$data['info']}}</h3>
                @else
                    @foreach($data as $result)
                        @include('movies.list_item')
                    @endforeach
                @endif
            </div>
        </div>
    </div>


@endsection
