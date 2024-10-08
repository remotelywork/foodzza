
@extends('frontend::layouts.user')
@section('title')
{{ __('Ads') }}
@endsection
@section('content')
<div class="ads-area">
    @include('frontend::user.ads.include.__step')
    <div class="row gy-30">
        <div class="col-xxl-12">
            <div class="site-card">
                <div class="site-card-header">
                    <h3 class="site-card-title">@yield('title')</h3>
                </div>
                <div class="ads-item-inner">
                    <div class="row">
                        <div class="ads-item-grid">
                            @forelse ($ads as $ad)
                            <div class="ads-single-item">
                                <h3 class="title">{{ $ad->title }}</h3>
                                <p class="description">{{ __('Duration: :seconds Seconds',['seconds' => $ad->duration]) }}</p>
                                <h4 class="currency">{{ $currencySymbol.$ad->amount }}</h4>
                                <div class="btn-wrap">
                                    <a class="site-btn" target="_blank" href="{{ route('user.ads.view',encrypt($ad->id)) }}"><i class="icon-eye"></i> {{ __('View Ads') }}</a>
                                </div>
                                <div class="bg-pattern">
                                    <img src="{{ asset('frontend/default/images/shapes/ads-pattern.png') }}" alt="{{ $ad->title }}">
                                </div>
                            </div>
                            @empty
                            <div class="text-center">{{ __('No Ads Found!') }}</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
