@extends('backend.layouts.app')
@section('title')
    {{ __('Edit Order') }}
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('backend/css/choices.min.css') }}">
@endsection
@section('content')
    <div class="main-content">
        <div class="page-title">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="title-content">
                            <h2 class="title">{{ __('Edit order') }}</h2>
                            <a href="{{ url()->previous() }}" class="title-btn"><i
                                        icon-name="corner-down-left"></i>{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="site-card">
                        <div class="site-card-body">
                            <form action="{{route('admin.order.update',$order->id)}}" method="post" enctype="multipart/form-data" class="row">
                                @method('PUT')
                                @csrf

                                <div class="col-xl-6 schema-name">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Order number:') }}</label>
                                        <input type="text" name="name" value="{{ $order->order_number }}" class="box-input" readonly  required />
                                    </div>
                                </div>
                                <div class="col-xl-6 schema-badge">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('User name:') }}</label>
                                        <input value="{{ $order->user->username }}" class="box-input" readonly/>
                                    </div>
                                </div>


                                <div class="col-xl-6 number-period">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Promo code:') }}</label>
                                        <div class="input-group joint-input">
                                            <input type="text" name="promo_code" value="{{ $order->promo_code }}" class="form-control" readonly />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 number-period">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Promo discount:') }}</label>
                                        <div class="input-group joint-input">
                                            <input type="text" name="promo_code" value="{{ $order->promo_discount }}" class="form-control" readonly />
                                            <span class="input-group-text">{{ setting('site_currency','global') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Delivery Status:') }}</label>
                                        <select name="delivery_status" class="form-select" required>
                                            <option value="" disabled selected>{{ __('Select status') }}</option>
                                                <option value="pending"  {{ $order->delivery_status == 'pending' ? 'selected' : '' }}>  {{ __('Pending') }}</option>
                                                <option value="processing" {{ $order->delivery_status == 'processing' ? 'selected' : '' }}> {{ __('Processing') }}</option>
                                                <option value="on_delivery" {{ $order->delivery_status == 'on_delivery' ? 'selected' : '' }}> {{ __('On delivery') }}</option>
                                                <option value="delivered" {{ $order->delivery_status == 'delivered' ? 'selected' : '' }}> {{ __('Delivered') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6  cancel-expiry">
                                    <div class="site-input-groups">
                                        <label class="box-input-label"
                                               for="">{{ __('Total Amount:') }}</label>
                                        <div class="input-group joint-input">
                                            <input type="text" value="{{ $order->total_amount }}" name="total_amount" class="form-control" readonly=""/>
                                            <span class="input-group-text">{{ setting('site_currency','global') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        {{  $order->product_details }}
                                    </div>
                                    <div class="col-xl-6">
                                        {{ $order->billing_details }}
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <button type="submit" class="site-btn-sm primary-btn w-100">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

