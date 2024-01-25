<nav class="navbar navbar-expand-lg p-3" style="background-color: #2C464E">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="#">Charon Bookstore</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Manage Books
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('books') }}">View All Books</a></li>
                        @if(auth()->user()->role == 'admin')
                            <li><a class="dropdown-item" href="{{ route('create_book') }}">Create Book</a></li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Manage Publishers
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('publishers') }}">View All Publishers</a></li>
                        @if(auth()->user()->role == 'admin')
                            <li><a class="dropdown-item" href="{{ route('create_publisher') }}">Create Publisher</a></li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Manage Authors
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('authors') }}">View All Authors</a></li>
                        @if(auth()->user()->role == 'admin')
                            <li><a class="dropdown-item" href="{{ route('create_author') }}">Create Author</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
            <div class="d-flex gap-5">
                <form class="d-flex" role="search" action="{{ route('search_books') }}" method="get">
                    @csrf
                    @method('GET')
                    <input class="form-control me-2" type="search" name="search" placeholder="Search books" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
                <a class="lead text-white m-l-2"  href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </div>
</nav>
