<style>
    .active {
        display: inline-flex;
        border-bottom: 3px solid #9146ff;
        border-radius: 3px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color:#18181b;">
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
                    <a class="nav-link text-white {{ Request::is('home') ? 'active' : '' }}" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('form') ? 'active' : '' }}" href="/form">Form</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('analysis') ? 'active' : '' }}"
                        href="/analysis">Analysis</a>
                </li>

            </ul>

        </div>

        <!-- Right elements -->
        <div class="d-flex align-items-center">

            <div class="dropdown">
                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                    id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="25"
                        alt="Black and White Portrait of a Man" loading="lazy" />
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
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
        </div>
    </div>
</nav>
