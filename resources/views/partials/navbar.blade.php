<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="/home">
                <img src="/img/logo-tsel.png" alt="logo telkomsel" width="30">
                <img src="/img/telkomsel.png" alt="telkomsel" width="150">
            </a>
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Home' ? 'active' : '' }}" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Form' ? 'active' : '' }}" href="/form">Form</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Type Rectifier
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">TTC</a></li>
                        <li>
                            <hr class="dropdown-divider m-0">
                        </li>
                        <li><a class="dropdown-item" href="#">Inner</a></li>
                        <li>
                            <hr class="dropdown-divider m-0">
                        </li>
                        <li><a class="dropdown-item" href="#">Outer</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <!-- Icon -->
            <a class="text-reset me-3" href="#">
                <i class="fas fa-shopping-cart"></i>
            </a>

            <!-- Notifications -->
            <div class="dropdown">
                <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                    role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge rounded-pill badge-notification bg-danger">1</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="#">Some news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Another news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                </ul>
            </div>
            <!-- Avatar -->
            <div class="dropdown">
                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                    id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="25"
                        alt="Black and White Portrait of a Man" loading="lazy" />
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                    <li>
                        <a class="dropdown-item" href="#">My profile</a>
                    </li>
                    <li>
                        <hr class="m-0 dropdown-divider">
                    </li>
                    <li>
                        @auth
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                    Logout</button>
                            </form>
                        @endauth
                    </li>
                </ul>
            </div>
            {{-- <div class="logoutBtn ms-4">
                @auth
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-lg btn-block btn-primary" style="background-color:#dd4b39;"><i
                                class="bi bi-box-arrow-right"></i>
                            Logout</button>
                    </form>
                @endauth
            </div> --}}
        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
