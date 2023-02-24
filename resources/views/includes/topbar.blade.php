<body>
    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-none d-xl-flex align-items-center align-items-end fixed-top topbar-transparent">
        <div class="container d-flex justify-content-end">
            <div class="social-links">
                <a href="{{ route('home') }}" class="login"><i class="fa fa-home"></i> Home</a>
                <a href="gallery" class="login"><i class="fa fa-image"></i> Gallery</a>
                <a href="#footer" class="login"><i class="fa fa-address-book"></i> Contact Us</a>
                @auth
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Log Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
                @else
                <a href="#" class="login" data-toggle="modal" data-target="#loginModal"><i
                     class="fa fa-sign-in"></i> Login</a>
                @endauth
            </div>
        </div>
    </div>
    @include('includes.login')