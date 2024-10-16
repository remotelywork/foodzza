@include('frontend.foodzza.include.__head')
@include('frontend.foodzza.include.__header')
<!--Custom Banner-->
<section class="custom-banner yellow-bg flower">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 centered">
                <div class="banner-title">
                    <h3>{{ __('User Panel') }}</h3>
                </div>
            </div>
        </div>
    </div>
</section><!--Custom Banner-->

<!--My Orders-->
<section class="section-padding gray-bg">
    <div class="container-fluid">
        {{--<div class="row">--}}
            {{--<div class="col-xl-8">--}}
                {{--<div class="section-title">--}}
                    {{--<h2>{{ __('My Orders') }}</h2>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="row">
            <div class="col-xl-3 col-sm-6">
                <div class="back-sidemenu">
                    <ul>
                        <li><a href="{{ route('user.dashboard') }}" >{{__('My Orders')}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Order Number</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Delivery man</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td>
                                @php
                                    $items = json_decode($order->product_details);
                                @endphp
                                <table class="table">

                                    <tbody>
                                    @foreach($items as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            {{--<td>{{ $item->quantity }}</td>--}}
                                            {{--<td>{{ $currencySymbol }}{{ $item->total_price }}</td>--}}
                                            <td>
                                                @php
                                                    $complementaryItems = json_decode($item->complimentary_items);
                                                @endphp
                                                @if(!empty($complementaryItems))
                                                    <ul>
                                                        @foreach($complementaryItems as $complementary)
                                                            <li>{{ $complementary->name }} - {{ $currencySymbol }}{{ $complementary->price }}</li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    No items
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                             </td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $currencySymbol }}{{ $order->total_amount }}</td>
                            <td>{{ $order->delivery_status }}</td>
                            <td>Nantu</td>
                        </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.foodzza.include.__footer')



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
@include('frontend.foodzza.include.__script')
</body>
</html>