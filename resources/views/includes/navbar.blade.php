<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('home')}}">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @if(Session::get('admin') == 'category')
                    @php $active = "active" @endphp
                @else
                    @php $active = "" @endphp
                @endif
            <li class="nav-item {{$active}}">
                <a class="nav-link" href="{{route('category.index')}}">Categories</a>
            </li>
            @if(Session::get('admin') == 'blog')
                    @php $active = "active" @endphp
                @else
                    @php $active = "" @endphp
                @endif
            <li class="nav-item {{$active}}">
                <a class="nav-link" href="{{route('blog.index')}}">Blogs</a>
            </li>
            @if(Session::get('admin') == 'author')
                    @php $active = "active" @endphp
                @else
                    @php $active = "" @endphp
                @endif
            <li class="nav-item {{$active}}">
                <a class="nav-link" href="{{route('author.index')}}">Authors</a>
            </li>
        </ul>
    </div>
</nav>
