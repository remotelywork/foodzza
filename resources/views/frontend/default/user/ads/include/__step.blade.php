<div class="ads-step">
    <div class="ads-step-inner">
        <a @class([
            'step-btn',
            'is-active' => Route::is('user.ads.index')
        ]) href="{{ route('user.ads.index') }}">{{ __('Ads') }}</a>

        <a @class([
            'step-btn',
            'is-active' => Route::is('user.my.ads.index')
        ]) href="{{ route('user.my.ads.index') }}">{{ __('My Ads') }}</a>

        <a @class([
            'step-btn',
            'is-active' => Route::is('user.ads.clicks')
        ]) href="{{ route('user.ads.clicks') }}">{{ __('Clicks') }}</a>
    </div>
</div>