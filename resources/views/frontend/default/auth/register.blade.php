@include('frontend.foodzza.include.__head')
@include('frontend.foodzza.include.__header')
<!--Custom Banner-->
<section class="custom-banner yellow-bg flower">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 centered">
                <div class="banner-title">
                    <h3>{{ __('Register Area') }}</h3>
                </div>
            </div>
        </div>
    </div>
</section><!--Custom Banner-->

<!--Main Content Area-->
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12">
                <div class="content-center">
                    <div class="account-form">
                        <div class="via-login">
                            <a href="" class="facebook-bg"><i class="fab fa-facebook-f"></i></a>
                            <a href="" class="google-plus-bg"><i class="fab fa-google"></i></a>
                            <a href="" class="instagram-bg"><i class="fab fa-instagram"></i></a>
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

                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="{{ __('First Name') }}">
                                </div>
                                <div class="col-xl-6">
                                    <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="{{ __('Last Name') }}">
                                </div>
                                <div class="col-xl-12">
                                    <input type="text" name="username" value="{{ old('username') }}" placeholder="{{ __('Username') }}">
                                </div>
                                <div class="col-xl-12">
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('Email') }}">
                                </div>
                                <div class="col-xl-6">
                                    <select id="gender-select" name="gender" class="form-control">
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                                <div class="col-xl-12">
                                    <input type="password" name="password" placeholder="{{ __('Password') }}">
                                </div>
                                <div class="col-xl-12">
                                    <button type="submit" class="bttn-mid btn-fill w-100">{{ __('Create my account') }}</button>
                                </div>
                                <div class="col-xl-12">
                                    <p><a href="{{ route('login') }}">{{ __('Do you already have an account?') }}</a></p>
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