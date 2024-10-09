@extends('backend.layouts.app')
@section('title')
    {{ __('Add New Promo Code') }}
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
                            <h2 class="title">{{ __('Add New Promo Code') }}</h2>
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
                            <form action="{{route('admin.promo-code.store')}}" method="post" enctype="multipart/form-data" class="row">
                                @csrf
                                <div class="col-xl-6 schema-name">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Name:') }}</label>
                                        <input type="text" name="name" class="box-input" placeholder="name" required />
                                    </div>
                                </div>
                                <div class="col-xl-6 schema-badge">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Code:') }}</label>
                                        <input type="text" class="box-input" placeholder="code" name="code" required />
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="site-input-groups row">
                                        <div class="col-xl-12">
                                            <label class="box-input-label" for="">{{ __('Discount Type:') }}</label>
                                            <select name="discount_type" class="form-select" required>
                                                <option value="fixed">{{ __('Fixed') }}</option>
                                                <option value="percentage">{{ __('Percentage') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 number-period">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Promo Code Validity:') }}</label>
                                        <div class="input-group joint-input">
                                            <input type="datetime-local" name="discount_validity" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6  cancel-expiry">
                                    <div class="site-input-groups">
                                        <label class="box-input-label"
                                               for="">{{ __('Amount:') }}</label>
                                        <div class="input-group joint-input">
                                            <input type="number" placeholder="Amount" name="amount" class="form-control"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Status:') }}</label>
                                        <div class="switch-field same-type">
                                            <input type="radio" id="radio-five" name="status" checked=""  value="1" />
                                            <label for="radio-five">{{ __('Active') }}</label>
                                            <input type="radio" id="radio-six" name="status" value="0" />
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