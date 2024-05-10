<div class="container p-0">
    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
        <a href="" class="navbar-brand d-block d-lg-none">Navigation</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav m-auto">
                <a href="{{route('frontend.home')}}" class="nav-item nav-link active">Home</a>
                <a href="{{route('about.Us')}}" class="nav-item nav-link">About</a>
                <a href="{{route('blog.add')}}" class="nav-item nav-link">Post</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Profile</a>
                @guest
                <div class="dropdown-menu">
                    <a href="{{route('user.login')}}" class="dropdown-item">Login </a>
                    <a href="{{route('user.registration')}}" class="dropdown-item">Registration</a>
                </div>
                @endguest
                @auth
                <div class="dropdown-menu">
                    <a href="{{route('user.logout')}}" class="dropdown-item">LogOut </a>
                    <a href="{{route('my.post')}}" class="dropdown-item">My Post </a>
                </div>
                @endauth
            </div>

        </div>
</div>
</nav>
</div>