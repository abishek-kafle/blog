<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('home')}}">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link active" href="{{route('category.index')}}">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('blog.index')}}">Blogs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('author.index')}}">Authors</a>
            </li>
        </ul>
    </div>
</nav>