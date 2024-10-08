@extends('frontend::layouts.user')
@section('title')
{{ __('Ads Clicks') }}
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
                <div class="clicks-adds-wrapper">
                    <div class="site-table clicks-table table-responsive">
                        <table class="table text-center">
                            <thead class="thead">
                                <tr>
                                    <th scope="col">{{ __('SL') }}</th>
                                    <th scope="col">{{ __('Ads') }}</th>
                                    <th scope="col">{{ __('Amount') }}</th>
                                    <th scope="col">{{ __('Clicked Time') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($histories as $history)
                                <tr>
                                    <td>{{ $histories->firstItem() + $loop->index }}</td>
                                    <td>{{ $history?->ads?->title }}</td>
                                    <td>{{ $currencySymbol.$history->amount }}</td>
                                    <td>{{ $history->created_at->format('d M Y h:i A') }}</td>
                                </tr>
                                @empty
                                <td colspan="3" class="text-center">{{ __('No History Found!') }}</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $histories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
