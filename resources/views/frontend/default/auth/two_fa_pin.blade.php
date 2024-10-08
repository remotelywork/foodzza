@extends('frontend::layouts.auth')
@section('title')
{{ __('2FA Security') }}
@endsection
@section('content')
<!-- verification area start -->
<section class="verification-area">
    <div class="auth-wrapper">
        <div class="contents-inner">
            <div class="content">
                <div class="top-content">
                    <h3 class="title">{{ __('2FA Security') }}</h3>
                    <p class="description">
                        {{ __('Please enter the') }}
                        <strong>{{ __('OTP') }}</strong> {{ __('generated on your Authenticator App.') }}
                        <br>
                        {{ __('Ensure you submit the current one because it refreshes every 30 seconds.') }}
                    </p>
                </div>
                <form action="{{ route('user.setting.2fa.verify') }}" method="POST">
                    @csrf

                    <div class="inputs">
                        <div class="verification">
                            <input type="tel" maxlength="1" name="one_time_password" pattern="[0-9]" class="control-form">
                            <input type="tel" maxlength="1" name="one_time_password" pattern="[0-9]" class="control-form">
                            <input type="tel" maxlength="1" name="one_time_password" pattern="[0-9]" class="control-form">
                            <input type="tel" maxlength="1" name="one_time_password" pattern="[0-9]" class="control-form">
                            <input type="tel" maxlength="1" name="one_time_password" pattern="[0-9]" class="control-form">
                            <input type="tel" maxlength="1" name="one_time_password" pattern="[0-9]" class="control-form">
                        </div>
                    </div>
                    <div class="inputs">
                        <button type="submit" class="site-btn primary-btn w-100">
                            {{ __('Authenticate Now') }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
<!-- verification area end -->
@endsection
