@extends('backend.layouts.app')
@section('title')
    {{ __('Edit Promo Code') }}
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
                            <h2 class="title">{{ __('Edit Promo Code') }}</h2>
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
                            <form action="{{route('admin.promo-code.update',$promoCode->id)}}" method="post" enctype="multipart/form-data" class="row">
                                @csrf
                                @method('PUT')
                                <div class="col-xl-6 schema-name">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Name:') }}</label>
                                        <input type="text" name="name" class="box-input" value="{{ $promoCode->name }}" required />
                                    </div>
                                </div>
                                <div class="col-xl-6 schema-badge">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Code:') }}</label>
                                        <input type="text" class="box-input" value="{{ $promoCode->code }}" name="code" required />
                                    </div>
                                </div>

                                {{--<div class="col-xl-6">--}}
                                    {{--<div class="site-input-groups row">--}}
                                        {{--<div class="col-xl-12">--}}
                                            {{--<label class="box-input-label" for="">{{ __('Discount Type:') }}</label>--}}
                                            {{--<select name="discount_type" class="form-select" required>--}}
                                                {{--<option value="fixed" @if($promoCode->discount_type == 'fixed') selected @endif>{{ __('Fixed') }}</option>--}}
                                                {{--<option value="percentage" @if($promoCode->discount_type == 'percentage') selected @endif>{{ __('Percentage') }}</option>--}}
                                            {{--</select>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                <div class="col-xl-6 number-period">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Promo Code Validity:') }}</label>
                                        <div class="input-group joint-input">
                                            <input type="datetime-local" value="{{ \Carbon\Carbon::parse($promoCode->discount_validity)->format('Y-m-d\TH:i') }}" name="discount_validity" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6  cancel-expiry">
                                    <div class="site-input-groups">
                                        <label class="box-input-label"
                                               for="">{{ __('Amount:') }}</label>
                                        <div class="input-group joint-input">
                                            <input value="{{ $promoCode->amount }}" name="amount" class="form-control"/>
                                            <span class="input-group-text">{{ setting('site_currency','global') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Status:') }}</label>
                                        <div class="switch-field same-type">
                                            <input type="radio" id="radio-five" name="status" @if($promoCode->status == 1) checked @endif  value="1" />
                                            <label for="radio-five">{{ __('Active') }}</label>
                                            <input type="radio" id="radio-six" name="status" @if($promoCode->status == 0) checked @endif value="0" />
                                            <label for="radio-six">{{ __('Deactivate') }}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <button type="submit" class="site-btn-sm primary-btn w-100">
                                        {{ __('Add New Item') }}
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