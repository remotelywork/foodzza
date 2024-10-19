@include('frontend.foodzza.include.__head')
@include('frontend.foodzza.include.__header')
<!--Custom Banner-->
<section class="custom-banner yellow-bg flower">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 centered">
                <div class="banner-title">
                    <h3>{{ __('Login Area') }}</h3>
                </div>
            </div>
        </div>
    </div>
</section><!--Custom Banner-->

<!--Main Content Area-->
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                <div class="content-center">
                    <div class="account-form">
                        <div class="via-login">
                            <a href="" class="facebook-bg"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ route('google.redirect') }}" class="google-plus-bg"><i class="fab fa-google"></i></a>
                            <a href="" class="linkedin-bg"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
                                </div>
                                <div class="col-xl-12">
                                    <input type="password" name="password" placeholder="Password" required>
                                </div>

                                <div class="col-xl-12">
                                    <button type="submit" class="bttn-mid btn-fill w-100">{{ __('Login Account') }}</button>
                                </div>
                                <div class="col-xl-12">
                                    <p><a href="{{ route('password.request') }}">Forgot password</a> | <a href="{{ route('register') }}">Create account</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/Main Content Area-->

@include('frontend.foodzza.include.__footer')



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
@include('frontend.foodzza.include.__script')

</body>
</html>