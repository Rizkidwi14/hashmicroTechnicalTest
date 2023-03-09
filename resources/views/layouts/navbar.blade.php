<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a href="" class="ms-3">
        <img src="/assets/laravel.png" width="50" height="50">
    </a>
    <div class="navbar-nav">
        <a class="nav-link {{ Request::is('test') ? 'active' : '' }}" href="test">Laravel</a>
        <a class="nav-link {{ Request::is('user') ? 'active' : '' }}" href="user">User</a>
        <a class="nav-link {{ Request::is('author') ? 'active' : '' }}" href="author">Author</a>
        <a class="nav-link {{ Request::is('buku') ? 'active' : '' }}" href="buku">Buku</a>
        <a class="nav-link {{ Request::is('math') ? 'active' : '' }}" href="math">Math</a>
    </div>
    <!-- Navbar-->
    <div class="navbar-nav ms-auto">
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-capitalize" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw "></i>
                {{ auth()->user()->username }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
