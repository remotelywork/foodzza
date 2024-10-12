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
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                Have a coupon?
                                <button class="bttn-small btn-fill cl-primary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Click here to enter your code
                                </button>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <span>If you have a coupon code, please apply it below.</span>
                                    <form action="#">
                                        <input type="text" placeholder="Coupon code" required>
                                        <button type="submit" class="bttn-small btn-fill-2">Apply</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="checkout-card">
                    <div class="card">
                        <div class="card-header">
                            <h4>Billing Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="input-text">
                                <input class="input-text" type="text" placeholder="First name*">
                            </div>
                            <div class="input-text">
                                <input class="input-text" type="text" placeholder="Last name*">
                            </div>
                            <div class="input-text">
                                <input class="input-text" type="text" placeholder="Company name">
                            </div>
                            <div class="input-text">
                                <select name="counrty">
                                    <option value="">United States (US)</option>
                                    <option value="">Germany</option>
                                    <option value="">Italy</option>
                                    <option value="">United Kingdom (UK)</option>
                                    <option value="">France</option>
                                    <option value="">Poland</option>
                                    <option value="">Ireland</option>
                                </select>
                            </div>
                            <div class="input-text">
                                <input class="input-text" type="text" placeholder="Street address 1*">
                            </div>
                            <div class="input-text">
                                <input class="input-text" type="text" placeholder="Street address 2*">
                            </div>
                            <div class="input-text">
                                <input class="input-text" type="text" placeholder="Town / City*">
                            </div>
                            <div class="input-text">
                                <select name="state">
                                    <option value="">Alabama</option>
                                    <option value="">Alaska</option>
                                    <option value="">Arizona</option>
                                    <option value="">California</option>
                                    <option value="">Florida</option>
                                    <option value="">Georgia</option>
                                    <option value="">Hawaii</option>
                                </select>
                            </div>
                            <div class="input-text">
                                <input class="input-text" type="text" placeholder="Zip*">
                            </div>
                            <div class="input-text">
                                <input class="input-text" type="text" placeholder="Phone">
                            </div>
                            <div class="input-text">
                                <input class="input-text" type="email" placeholder="Email*">
                            </div>
                            <div class="input-text">
                                <textarea name="additional-msg" rows="4" placeholder="Additional Message: Note about your order"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="checkout-card">
                    <div class="card">
                        <div class="card-header">
                            <h4>Your order</h4>
                        </div>
                        <div class="card-body">
                            <div class="single-checkout-total">
                                <p class="checkout-amount">Product</p>
                                <p class="checkout-amount">Subtotal</p>
                            </div>
                            <div class="single-checkout-total">
                                <p>Incredible showpieces for office  × 2</p>
                                <p class="checkout-amount">$30</p>
                            </div>
                            <div class="single-checkout-total">
                                <p class="checkout-amount">Subtotal</p>
                                <p class="checkout-amount">$30</p>
                            </div>
                            <div class="single-checkout-total">
                                <p class="checkout-amount">Total</p>
                                <h4 class="checkout-amount cl-primary">$30</h4>
                            </div>
                            <div class="payment-options">
                                <ul>
                                    <li>
                                        <input type="radio" id="cash_on" name="payment" value="cash-on-delivery">
                                        <label for="cash_on">Cash on delivery</label>
                                        <div class="payment-option-text">
                                            Make payment when you receive the item
                                        </div>
                                    </li>
                                    <li>
                                        <input type="radio" id="credit_card" name="payment" value="cash-payment">
                                        <label for="credit_card">Credit or Debit card</label>
                                        <div class="payment-option-text">
                                            Credit card payment
                                        </div>
                                    </li>
                                    <li>
                                        <input type="radio" id="paypal_payment" name="payment" value="paypal">
                                        <label for="paypal_payment">Paypal</label>
                                        <div class="payment-option-text">
                                            Use paypal to instant payment
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <a href="" class="bttn-mid btn-fill">Place order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/Checkout area-->
@include('frontend.foodzza.include.__footer')
@include('frontend.foodzza.include.__script')

</body>
</html>