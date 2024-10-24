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
                    <div class="col-xl-10">
                        <div class="title-content">
                            <h2 class="title">{{ __('Order detail') }}</h2>
                            <a href="{{ url()->previous() }}" class="title-btn"><i
                                        icon-name="corner-down-left"></i>{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="site-card">
                        <div class="site-card-body">
                            <form action="{{route('admin.order.update',$order->id)}}" method="post" enctype="multipart/form-data" class="row">
                                @method('PUT')
                                @csrf

                                <div class="col-xl-5">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Delivery Status:') }}</label>
                                        <select name="delivery_status" class="form-select" required>
                                            <option value="" disabled selected>{{ __('Select status') }}</option>
                                            <option value="pending"  {{ $order->delivery_status == 'pending' ? 'selected' : '' }}>  {{ __('Pending') }}</option>
                                            <option value="processing" {{ $order->delivery_status == 'processing' ? 'selected' : '' }}> {{ __('Processing') }}</option>
                                            <option value="on_delivery" {{ $order->delivery_status == 'on_delivery' ? 'selected' : '' }}> {{ __('On delivery') }}</option>
                                            <option value="delivered" {{ $order->delivery_status == 'delivered' ? 'selected' : '' }}> {{ __('Delivered') }}</option>
                                            <option value="cancel" {{ $order->delivery_status == 'cancel' ? 'selected' : '' }}> {{ __('Cancel') }}</option>
                                        </select>
                                    </div>
                                </div>

                                @can(['order-manage'])
                                <div class="col-xl-5">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="delivery_boy">{{ __('Assign Delivery Man:') }}</label>
                                        <select name="delivery_man" class="form-select">
                                            <option value=""  selected>{{ __('Select delivery man') }}</option>
                                            @foreach($delivery_mans as $delivery_man)
                                                <option value="{{ $delivery_man->id }}" {{ $delivery_man->id == $order->delivery_man ? 'selected' : '' }}>
                                                    {{ $delivery_man->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endcan

                                <div class="col-xl-5">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="message">{{ __('Message:') }}</label>
                                        <input name="message" value="{{ $order->message }}" type="text" class="box-input mb-0">
                                    </div>
                                </div>

                                <div class="col-xl-2">
                                    <button type="submit" class="site-btn-sm primary-btn mt-4">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                                {{--<div class="col-xl-2">--}}
                                    {{--<button type="button" class="site-btn-sm primary-btn mt-4" onclick="printOrder()">--}}
                                        {{--{{ __('Print') }}--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                            </form>

                            <div class="row" id="printableArea">
                                <div class="col-xl-6">
                                    <?php
                                        $biling_details = json_decode($order->billing_details)
                                    ?>
                                    <p style="margin-bottom: 0.1rem; font-size: 14px;">Name: {{ $biling_details->name }}</p>
                                    <p style="margin-bottom: 0.1rem; font-size: 14px;">Email: {{ $biling_details->email }}</p>
                                    <p style="margin-bottom: 0.1rem; font-size: 14px;"> Phone: {{ $biling_details->phone }}</p>
                                    <p style="margin-bottom: 0.1rem; font-size: 14px;">Address: {{ $biling_details->address }}</p>
                                    @if($biling_details->additional_msg)
                                        <p style="margin-bottom: 0.1rem; font-size: 14px;"> Message From Customer : {{ $biling_details->name }}</p>
                                    @endif
                                </div>
                                <div class="col-xl-6" style="text-align: right; margin-bottom: 0%;">
                                    <p style="margin-bottom: 0.1rem; font-size: 14px;">Order# {{ $order->order_number }}</p>
                                    <p style="margin-bottom: 0.1rem; font-size: 14px;">Order Date: {{ $order->created_at }}</p>
                                    <p style="margin-bottom: 0.1rem; font-size: 14px;">Total Amount: {{ $order->total_amount }}</p>
                                    <p style="margin-bottom: 0.1rem; font-size: 14px;">Payment method: {{ $order->payment_method }}</p>
                                </div>

                                <div class="site-table table-responsive mt-4 p-0">

                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Description</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Complimentary Items</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $items = json_decode($order->product_details);
                                        @endphp

                                        @foreach($items as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>
                                                    @php
                                                        $complimentary_items = json_decode($item->complimentary_items);
                                                    @endphp
                                                    @if(!empty($complimentary_items))
                                                        @foreach($complimentary_items as $complimentary)
                                                            <p style="margin-bottom: 0.01rem; font-size: 14px;">{{ $complimentary->name }} - {{ $currencySymbol }}{{ $complimentary->price }}</p>
                                                        @endforeach
                                                    @else
                                                        <p>No Complimentary Items</p>
                                                    @endif
                                                </td>
                                                <td>{{ $currencySymbol }}{{ $item->total_price }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-xl-12" style="text-align: right; margin-bottom: 10px;">
                                    <p>Sub Total: {{ $currencySymbol }}{{ $order->total_amount }}</p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
function printOrder() {
    var printContents = document.getElementById('printableArea').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}
</script>
