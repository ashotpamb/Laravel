@include('includes.header')
@section("title","Home")
<body>
<div class="container h-50">
    <div class="d-flex justify-content-center h-100">
        <form action="/api" method="post" class="searchbar">
            <input class="search_input" type="text" name="search" placeholder="Search...">
            <a class="search_icon"><i class="fas fa-search"></i></a>
        </form>
    </div>
    <div class="data-from-api">
    </div>
</div>
</body>
</html>
