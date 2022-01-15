<body onload="getPhoto();">
    <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="/images/logo.svg" alt="Logo" /><span
                    style="position: absolute; margin-top: 13px;">&nbsp;&nbsp;Fade Kopi</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('categories') }}" class="nav-link">Categories</a>
                    </li>

                    @guest
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-success nav-link px-4 text-white">Sign In</a>
                        </li>
                    @endguest
                </ul>

                @auth
                    <!-- Desktop Menu -->
                    <ul class="navbar-nav d-none d-lg-flex">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                                onclick="getInput();" data-toggle="dropdown">
                                <img src="/images/icon-user.png" id="myPict" alt="foto"
                                    class="rounded-circle mr-2 profile-picture" />
                                Hallo, <input type="text"
                                    style="width: 100px; text-weight: 500px; border:transparent; background:transparent; text-align: right;"
                                    id="myInput" value="{{ Auth::user()->name }}" disabled>
                            </a>
                            <div class="dropdown-menu">
                                <a href="{{ route('dashboard-user') }}" class="dropdown-item" id="item-user">Dashboard</a>

                                <a href="{{ route('admin-dashboard') }}" class="dropdown-item" id="item-admin"
                                    style="display: none;">Dashboard
                                    Admin</a>

                                <a href="{{ route('dashboard-settings-account') }}" class="dropdown-item">
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                                @php
                                    $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                                @endphp
                                @if ($carts > 0)
                                    <img src="/images/icon-cart-filled.svg" alt="" />
                                    <div class="card-badge">{{ $carts }}</div>
                                @else
                                    <img src="/images/icon-cart-empty.svg" alt="" id="potoCart" />
                                @endif
                            </a>
                        </li>
                    </ul>

                    <ul class="navbar-nav d-block d-lg-none">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                Hallo, <b> {{ Auth::user()->name }} </b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cart') }}" class="nav-link d-inline-block">
                                Cart
                            </a>
                        </li>
                    </ul>
                @endauth

            </div>
        </div>
    </nav>
</body>

<script>
    function getInput() {
        var inpx = document.getElementById("myInput").value;
        if (inpx == 'Fade Kopi') {
            document.getElementById('item-admin').style.display = "block";
            document.getElementById('item-user').style.display = "none";
        }
    }

    function getPhoto() {
        var inpx = document.getElementById("myInput").value;
        if (inpx == 'Fade Kopi') {
            var imgg = document.getElementById("myPict");
            imgg.src = '/images/icons-testimonial-1.png';

            var imcart = document.getElementById("potoCart");
            imcart.src = '';
            imcart.style.display = "none";
        }
    }
</script>
