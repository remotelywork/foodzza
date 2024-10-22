@extends('backend.layouts.app')
@section('title')
    {{ __('Food Items') }}
@endsection
@section('style')
    <script src="{{ asset('global/js/jquery.min.js') }}"></script>
@endsection
@section('content')
    <div class="main-content">
        <div class="page-title">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="title-content">
                            <h2 class="title">{{ __($title) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="site-card">
                <div class="site-card-body">
                    <div class="site-table table-responsive">
                        <form action="{{ request()->url() }}" method="get">
                            <div class="table-filter d-flex justify-content-between">
                                <div class="filter d-flex">
                                    <div class="search">
                                        <input type="text" id="search" name="query" value="{{ request('query') }}" placeholder="Search" />
                                    </div>
                                    <button type="submit" class="apply-btn ms-2"><i data-lucide="search"></i>{{ __('Search') }}</button>
                                </div>
                            </div>
                        </form>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('Order Number') }}</th>
                                <th>{{ __('User Name') }}</th>
                                <th>{{ __('Quantity') }}</th>
                                <th>{{ __('Promo Code') }}</th>
                                <th>{{ __('Promo Discount') }}</th>
                                <th>{{ __('Total Amount') }}</th>
                                <th>{{ __('Delivery Status') }}</th>
                                <th>{{ __('Payment Method') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->user->username }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>
                                        @if($order->promo_code == null)
                                            N/A
                                        @else
                                        {{ $order->promo_code }}</td>
                                        @endif
                                    <td>{{ $currencySymbol }}{{ $order->promo_discount }}</td>
                                    <td>{{ $currencySymbol }}{{ $order->total_amount }}</td>
                                    <td>
                                        @if($order->delivery_status == "pending")
                                            <div class="site-badge pending">{{ __('Pending') }}</div>
                                        @elseif($order->delivery_status == 'processing')
                                            <div class="site-badge pending">{{ __('Processing') }}</div>
                                        @elseif($order->delivery_status == 'on_delivery')
                                            <div class="site-badge pending">{{ __('On Delivery') }}</div>
                                        @elseif($order->delivery_status == 'delivered')
                                            <div class="site-badge success">{{ __('Delivered') }}</div>
                                        @endif
                                    </td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>
                                        <a href="{{ route('admin.order.edit',$order->id) }}" class="round-icon-btn primary-btn" type="button" id="edit"
                                           data-id="{{ $order->id }}" >
                                            <i icon-name="edit-3"></i>
                                        </a>
                                        @can(['order-manage'])
                                            <form action="{{ route('admin.order.destroy', $order->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="round-icon-btn primary-btn" id="delete" data-id="{{ $order->id }}">
                                                    <i icon-name="delete"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <td colspan="8" class="text-center">{{ __('No Data Found!') }}</td>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection