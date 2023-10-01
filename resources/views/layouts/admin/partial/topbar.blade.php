<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">


                </a>

                <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/image/favicon.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/image/favicon.png') }}" alt="" height="50">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form>


        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="" style="margin-right:2%">
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 sm:block d-flex">
                        @auth
                            <li class="nav-item btn-group nav-item">
                            <li type="button" data-bs-toggle="dropdown">
                                <a style="text-transform: uppercase; font-size:13px; color:black" type="button"
                                    class="nav-link dropdown-toggle fw-bold" href="#" id="navbarDropdown"
                                    role="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php if (Auth::user()->picture__input) {
                                        echo "<img src='" . asset(Auth::user()->picture__input) . "'  style='height: 30px;width: 30px;border-radius: 100%;object-fit: cover;object-position: center center;'>";
                                    } else {
                                        echo "<img src='" . asset('uploads/defoultImage/comic-boy.png') . "'  style='height: 30px;width: 30px;border-radius: 100%;object-fit: cover;object-position: center center;'>";
                                    }
                                    ?>
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            <ul class="dropdown-menu dropdown-menu-lg-end sub-menu">
                                <li><a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Log out </a>
                                </li>
                            </ul>
                            </li>
                        @else
                            <li class="nav-item {{ request()->is('login') ? 'active' : '' }}">
                                <a class="nav-link text-success-custom" href="{{ url('login') }}">Log in</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-success-custom" href="#">|</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item {{ request()->is('user-type') ? 'active' : '' }}">
                                    <a href="{{ route('register') }}"
                                        class="text-sm text-gray-700 underline">Register</a>
                                </li>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>



{{-- js cdn --}}
