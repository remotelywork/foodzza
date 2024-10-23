@include('frontend.foodzza.include.__head')
@include('frontend.foodzza.include.__header')
<!--Custom Banner-->
<section class="custom-banner yellow-bg flower">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 centered">
                <div class="banner-title">
                    <h3>Checkout page</h3>
                </div>
            </div>
        </div>
    </div>
</section><!--Custom Banner-->

<!--Checkout area-->
<section class="section-padding gray-bg-2">
    <div class="container">
        <div class="row mb-40">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="coupon-accordion">
                    <div class="accordion" id="accordionExample">
                        @if(session('success'))
                            <div class="alert alert-success" id="success-alert">
                                {{ session('success') }}
                            </div>
                        @elseif(session('failed'))
                            <div class="alert alert-danger" id="failed-alert">
                                {{ session('failed') }}
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                Have a coupon?
                                <button class="bttn-small btn-fill cl-primary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Click here to enter your code
                                </button>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    @if($coupon)
                                        <span>You have already applied {{ $coupon_code }} this coupon</span>
                                    @else
                                        <span>If you have a coupon code, please apply it below.</span>
                                        <form action="{{ route('user.promo.apply') }}" method="POST">
                                            @csrf
                                            <input type="text" name="code" placeholder="Coupon code" required>
                                            <button type="submit" class="bttn-small btn-fill-2">Apply</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('user.order.place') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="checkout-card">
                        <div class="card">
                            <div class="card-header">
                                <h4>Billing Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="input-text">
                                    <input class="input-text" name="name" type="text" placeholder="Name*" required>
                                </div>
                                <div class="input-text">
                                    <input class="input-text" name="address" type="text" placeholder="Address" required>
                                </div>
                                <div class="input-text">
                                    <input class="input-text" name="phone" type="text" placeholder="Phone" required>
                                </div>
                                <div class="input-text">
                                    <input class="input-text" name="email" type="email" placeholder="Email*" required>
                                </div>
                                <div class="input-text">
                                    <textarea name="additional_msg" rows="4" placeholder="Additional Message: Note about your order"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="checkout-card">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('Your order') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="single-checkout-total">
                                    <p class="checkout-amount">{{ __('Product') }}</p>
                                    <p class="checkout-amount">{{ __('Subtotal') }}</p>
                                </div>
                                @foreach($carts as $cart)
                                    <div class="single-checkout-total">
                                        <p>{{ $cart->item->name }}  × {{ $cart->quantity }}</p>
                                        <p class="checkout-amount">{{ $currencySymbol }}{{ $cart->total_price }}</p>
                                    </div>
                                @endforeach

                                @if($coupon)
                                    <div class="single-checkout-total">
                                        <p class="checkout-amount">{{ __('Coupon Discount') }}</p>
                                        <p class="checkout-amount">- {{ $currencySymbol }}{{ $coupon->amount }}</p>
                                        <input type="hidden" name="code" value="{{ $coupon_code }}">
                                        <input type="hidden" name="coupon_amount" value="{{ $coupon_amount }}">
                                    </div>
                                @endif

                                <div class="single-checkout-total">
                                    <p class="checkout-amount">{{ __('Subtotal') }}</p>
                                    <p class="checkout-amount">{{ $currencySymbol }}{{ $total_price }}</p>
                                </div>

                                <div class="single-checkout-total">
                                    <p class="checkout-amount">{{ __('Total') }}</p>
                                    <h4 class="checkout-amount cl-primary">{{ $currencySymbol }}{{ $total_price }}</h4>
                                    <input type="hidden" name="total_price" value="{{ $total_price }}">
                                </div>

                                <!-- Payment Options -->
                                <div class="payment-options">
                                    <ul>
                                        <li>
                                            <input type="radio" id="cash_on" name="payment" value="cash-on-delivery" required>
                                            <label for="cash_on">Cash on delivery</label>
                                            <div class="payment-option-text">
                                                Make payment when you receive the item
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Place Order Button -->
                                <button type="submit" class="bttn-mid btn-fill">Place order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section><!--/Checkout area-->
@include('frontend.foodzza.include.__footer')
@include('frontend.foodzza.include.__script')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const successAlert = document.getElementById('success-alert');
        const failedAlert = document.getElementById('failed-alert');

        if (successAlert) {
            setTimeout(function () {
                successAlert.style.display = 'none';
            }, 3000);
        }
        if (failedAlert){
            setTimeout(function () {
                failedAlert.style.display = 'none';
            },3000)
        }
    });
</script>
</body>
</html>