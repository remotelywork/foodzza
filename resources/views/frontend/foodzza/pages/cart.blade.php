@include('frontend.foodzza.include.__head')
@include('frontend.foodzza.include.__header')
<!--Custom Banner-->
<section class="custom-banner yellow-bg flower">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 centered">
                <div class="banner-title">
                    <h3>Cart Page</h3>
                </div>
            </div>
        </div>
    </div>
</section><!--Custom Banner-->

<!--Cart area-->
<section class="section-padding gray-bg-2">
    <div class="container">
        <div class="row mb-60">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="cart-items table-responsive table-bordered centered">
                    <table class="table m-0">
                        <thead>
                        <tr>
                            <th scope="col">Food Item</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Shipping Charge</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Cancel Item</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carts as $food)
                            <tr>
                                <td><img src="{{ asset($food->item->thumb_image) }}" alt=""></td>
                                <td><a href="{{ route('food.details', $food->item->id) }}">{{ $food->item->name }}</a></td>
                                <td class="unit-price">
                                    @if($food->item->discount_price == null)
                                        {{ $food->item->price }}
                                    @else
                                        {{ $food->item->discount_price }}
                                    @endif
                                </td>
                                <td class="shipping-charge">
                                    @if($food->item->shipping_cost == null)
                                        Free
                                    @else
                                        {{ $food->item->shipping_cost }}
                                    @endif
                                </td>
                                <td>
                                    <input min="1" max="100" name="quantity" value="1" type="number" class="quantity-input"
                                           data-price="{{ $food->item->discount_price ?? $food->item->price }}"
                                           data-shipping="{{ $food->item->shipping_cost ?? 0 }}">
                                </td>
                                <td class="total-price">
                                    @if($food->item->discount_price == null)
                                        {{ $food->item->price + ($food->item->shipping_cost ?? 0) }}
                                    @else
                                        {{ $food->item->discount_price + ($food->item->shipping_cost ?? 0) }}
                                    @endif
                                </td>
                                <td><a href="{{ route('cart.delete', $food->id) }}"><i class="fas fa-times"></i></a></td>
                            </tr>
                        @endforeach
                        <tr class="text-right">
                            <td colspan="6">
                                <a href="{{ route('home') }}" class="bttn-small btn-fill-2 mr-3">Continue Shopping</a>
                                 <button class="bttn-small btn-fill">Update Cart</button>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                <div class="cart-card">
                    <div class="card">
                        <div class="card-header">
                            <h4>Promo Code</h4>
                        </div>
                        <div class="card-body">
                            <p>Input your Promo Code</p>
                            <form action="{{ route('promo-code.check') }}" method="post" class="form-inline">
                                @csrf
                                <input type="text" name="code" placeholder="Promo code" required>
                                <button type="submit" class="bttn-small btn-fill-2">Check</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="cart-card">
                    <div class="card">
                        <div class="card-header">
                            <h4>Calculate Total</h4>
                        </div>
                        <div class="card-body">
                            <div class="single-cart-total">
                                <p>Subtotal</p>
                                <p class="cart-amount" id="subtotal">$0.00</p> <!-- Updated ID -->
                            </div>
                            <div class="single-cart-total">
                                <p>Total</p>
                                <p class="cart-amount" id="total">$0.00</p> <!-- Updated ID -->
                            </div>
                            <a href="checkout.html" class="bttn-small btn-fill">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section><!--/Cart area-->

@include('frontend.foodzza.include.__footer')
@include('frontend.foodzza.include.__script')
        <script>
            document.querySelectorAll('.quantity-input').forEach(input => {
                input.addEventListener('change', function () {
                    let quantity = parseInt(this.value);
                    let price = parseFloat(this.getAttribute('data-price'));
                    let shipping = parseFloat(this.getAttribute('data-shipping'));

                    // Calculate total: (price * quantity) + shipping
                    let total = (price * quantity) + shipping;

                    // Update the total price in the DOM
                    let totalPriceElement = this.closest('tr').querySelector('.total-price');
                    totalPriceElement.textContent = total.toFixed(2);
                });
            });


            document.addEventListener('DOMContentLoaded', function () {
                // Function to calculate the subtotal and total
                function calculateTotal() {
                    let subtotal = 0;
                    let total = 0;

                    // Loop through all quantity inputs to calculate the subtotal and total
                    document.querySelectorAll('.quantity-input').forEach(input => {
                        let quantity = parseInt(input.value);
                        let price = parseFloat(input.getAttribute('data-price'));
                        let shipping = parseFloat(input.getAttribute('data-shipping'));

                        // Calculate total for each item: (price * quantity) + shipping
                        let itemTotal = (price * quantity) + shipping;

                        // Add to subtotal (without shipping)
                        subtotal += price * quantity;

                        // Add to total (including shipping)
                        total += itemTotal;

                        // Update the item's total price in the table row
                        let totalPriceElement = input.closest('tr').querySelector('.total-price');
                        totalPriceElement.textContent = itemTotal.toFixed(2);
                    });

                    // Update the subtotal and total values in the cart
                    document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
                    document.getElementById('total').textContent = `$${total.toFixed(2)}`;
                }

                // Initial calculation on page load
                calculateTotal();

                // Add event listeners to quantity inputs to recalculate total on change
                document.querySelectorAll('.quantity-input').forEach(input => {
                    input.addEventListener('change', calculateTotal);
                });
            });

        </script>
</body>
</html>