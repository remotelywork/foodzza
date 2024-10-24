<body>

<!-- Preloader -->
<div class="preloader">
    <img src="{{ asset('frontend/default/images/logo.png') }}" alt="">
</div><!--/Preloader -->


<!--Header Area-->
<header class="header-area">
    <nav class="navbar navbar-expand-lg main-menu">
        <div class="container-fluid">

            <a class="navbar-brand" href="index.html"><img src="{{ asset('frontend/default/images/logo.png') }}" class="d-inline-block align-top" alt=""></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="menu-toggle"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="{{ route('home') }}" role="button"  aria-expanded="false">Home</a>

                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="shop.html">Shop page</a></li>
                            <li><a class="dropdown-item" href="product-details.html">Product Details</a></li>
                            <li><a class="dropdown-item" href="cart.html">Cart page</a></li>
                            <li><a class="dropdown-item" href="checkout.html">Checkout page</a></li>
                            <li><a class="dropdown-item" href="login.html">Login</a></li>
                            <li><a class="dropdown-item" href="register.html">Register</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-expanded="false">Menu</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="category.html">Breakfast</a></li>
                            <li><a class="dropdown-item" href="category.html">Lunch Items</a></li>
                            <li><a class="dropdown-item" href="category.html">Dinner Items</a></li>
                            <li><a class="dropdown-item" href="category.html">Snacks</a></li>
                            <li><a class="dropdown-item" href="category.html">Coffee</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="about.html">About us</a></li>
                    <li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-expanded="false">Pages</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="search.html">Search page</a></li>
                            <li><a class="dropdown-item" href="restaurant-resgister.html">Restaurant Register</a></li>
                            <li><a class="dropdown-item" href="restaurant-profile.html">Restaurant Profile</a></li>
                            <li><a class="dropdown-item" href="forgot-password.html">Forgot Password</a></li>
                            <li><a class="dropdown-item" href="user-dashboard.html">User Dashboard</a></li>
                            <li><a class="dropdown-item" href="user-orders.html">User Orders</a></li>
                            <li><a class="dropdown-item" href="settings.html">User Settings</a></li>
                            <li><a class="dropdown-item" href="contact.html">Contact</a></li>
                            <li><a class="dropdown-item" href="how-it-works.html">How it works</a></li>
                            <li><a class="dropdown-item" href="faq.html">Faq</a></li>
                            <li><a class="dropdown-item" href="privacy.html">Privacy Policy</a></li>
                            <li><a class="dropdown-item" href="terms.html">Terms & Service</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="blog.html" role="button" data-toggle="dropdown" aria-expanded="false">Blog</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="blog.html">All Blog</a></li>
                            <li><a class="dropdown-item" href="blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="header-btn justify-content-end">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <a href="{{ route('user.dashboard') }}" class="bttn-small btn-fill"><i class="fas fa-user"></i> Dashboard</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="bttn-small btn-fill"><i class="fas fa-user"></i> Login</a>
                    @endif

                    <a href="{{ route('user.carts') }}" class="bttn-round btn-fill-2 ml-2"><i class="fas fa-shopping-cart"></i><span>{{ cartCount() }}</span></a>
                </div>
            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-success" id="success-alert">
                {{ session('success') }}
            </div>
        @endif
        @if(session('failed'))
            <div class="alert alert-danger" id="failed-alert">
                {{session('failed')}}
            </div>
        @endif
    </nav>
</header><!--/Header Area-->