<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Blog App</a>

        <div class="collapse navbar-collapse">

            <ul class="navbar-nav me-auto">
                @auth
                    @if(auth()->user()->role_id == 1)
                        <li class="nav-item"><a class="nav-link" href="/admin/users">Users</a></li>
                        <li class="nav-item"><a class="nav-link" href="/admin/blogs">Blogs</a></li>
                    @endif
                @endauth
            </ul>

            <ul class="navbar-nav">
                @guest
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
                @else
                    <li class="nav-item"><span class="nav-link">{{ auth()->user()->name }}</span></li>
                    <li class="nav-item">
                        <form method="POST" action="/logout">
                            @csrf
                            <button class="btn btn-link nav-link">Logout</button>
                        </form>
                    </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>
