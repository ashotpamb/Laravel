@extends('includes.index')

@section('title', 'Home')

@section('content')

    <div class="container h-50 mt-5">
        <div class="d-flex justify-content-center h-100">
            <form action="list" method="get" class="searchbar">
                <input class="search_input" type="text" name="search" placeholder="Search...">
                <button type="submit" class="search_icon">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
        <div class="data-from-api">
            <img class="preloader" style="width: 500px; height: auto; margin: 0 auto; display: none; "
                 src="{{asset('img/preloader.gif')}}" alt="">
            <div class="movie-list">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    @if (Session::get('message') !== null)
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{Session::get('message')}}</li>
                            </ul>
                        </div>
                    @endif
            </div>
        </div>
    </div>


@endsection
