@include('includes.header')
@section("title","Home")
<body>
<p class="divp">Test</p>
<div class="container h-100">
    <div class="d-flex justify-content-center h-100">
        <form action="/api" method="post" class="searchbar">
            @csrf
            <input class="search_input" type="text" name="search" placeholder="Search...">
            <a class="search_icon"><i class="fas fa-search"></i></a>
        </form>
    </div>
</div>
</body>
</html>
