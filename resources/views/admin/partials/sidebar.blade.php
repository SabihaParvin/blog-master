<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="">
                    <span data-feather="layers" class="align-text-bottom"></span>
                    Profile | {{auth()->user()->name}}
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('users.list')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Users
                </a>
            </li>
           
            <li class="nav-item">
                <a class="nav-link" href="{{route('post.list')}}">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Post
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('comment.list')}}">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Comment
                </a>
            </li>
           
        </ul>
    </div>
</nav>