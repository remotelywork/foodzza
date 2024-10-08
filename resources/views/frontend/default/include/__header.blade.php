<body class="landing-page-bg">

<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Pre loader start -->
<div class="preloader">
    <div class='loader'>
        <div class='circle'></div>
        <div class='circle'></div>
        <div class='circle'></div>
        <div class='circle'></div>
        <div class='circle'></div>
    </div>
</div>
<!-- Pre loader end -->

<!-- Back to top start -->
<div class="backtotop-wrap cursor-pointer">
    <svg class="backtotop-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- Back to top end -->

<!-- Offcanvas area start -->
<div class="fix">
    <div class="offcanvas-area">
        <div class="offcanva-wrapper">
            <div class="offcanvas-content">
                <div class="offcanvas-top d-flex justify-content-between align-items-center">
                    <div class="offcanvas-logo">
                        <a href="{{route('home')}}">
                            <img src="{{ asset(setting('site_logo','global')) }}" alt="logo not found">
                        </a>
                    </div>
                    <div class="offcanvas-close">
                        <button class="offcanvas-close-icon">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mobile-menu fix"></div>
                <div class="offcanvas-btn mb-3">
                    <a class="site-btn warning-btn btn-xs" href="#"><i class="icon-home"></i>Dashboard</a>
                 </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas-overlay"></div>
<div class="offcanvas-overlay-white"></div>
<!-- Offcanvas area start -->

<!-- Header area start -->
<header>
    <div class="header-area header-transparent header-style-one" id="header-sticky">
        <div class="header-inner">
            <div class="header-logo">
                <a class="logo-white" href="{{route('home')}}"><img src="{{ asset(setting('site_logo','global')) }}" alt="Logo not found"></a>
                <a class="logo-black" href="{{route('home')}}"><img src="{{ asset(setting('site_logo','global')) }}" alt="Logo not found"></a>
            </div>
            <div class="header-menu d-none d-xl-inline-flex">
                <nav class="td-main-menu" id="mobile-menu">
                    <ul>
                        @foreach($navigations as $navigation)
                            @if($navigation->page->status|| $navigation->page_id == null)
                                <li>
                                    <a href="{{ url($navigation->url) }}">{{ $navigation->tname }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="header-right style-one">
                <div class="header-action">
                    <div class="header-btn-wrap d-none d-sm-block">
                        <div class="language-box">
                            <div class="header-lang-item header-lang">
                                <span class="header-lang-toggle" id="header-lang-toggle"><i class="fa-regular fa-globe"></i> <span class="lang-text">English</span></span>
                                <ul id="language-list" class="hidden">
                                    @foreach(\App\Models\Language::where('status',true)->get() as $lang)
                                    <li><a href="" value="{{ route('language-update',['name'=> $lang->locale]) }}" @selected( app()->getLocale() == $lang->locale )>{{$lang->name}} <span class="icon"></span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        @auth('web')
                            <div class="btn-inner d-none d-sm-block">
                                <a class="site-btn warning-btn btn-xs" href="{{ route('user.dashboard') }}"><i class="icon-home"></i>{{ __('Dashboard') }}</a>
                            </div>
                        @else
                            <div class="btn-inner d-none d-sm-block">
                                <a class="site-btn warning-btn btn-xs" href="{{ route('login') }}"><i class="icon-user-add"></i>{{ __('Login/Register') }}</a>
                            </div>
                        @endauth
                    </div>
                    <div class="header-hamburger ml-20 d-xl-none">
                        <div class="sidebar-toggle">
                            <a class="toggle-bar-icon" href="javascript:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header area end -->