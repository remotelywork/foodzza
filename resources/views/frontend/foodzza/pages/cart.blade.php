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
                            <th scope="col">Complimentary Items</th>
                            <th scope="col">Shipping Charge</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Cancel Item</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carts as $food)
                            @php
                                $complimentaryItems = json_decode($food['complimentary_item'], true);
                                $unitPrice = $food->item->discount_price ?? $food->item->price;
                                $shippingCost = $food->item->shipping_cost ?? 0;
                                $complimentaryTotal = 0;

                                if ($complimentaryItems && is_array($complimentaryItems)) {
                                    foreach ($complimentaryItems as $item) {
                                        $complimentaryTotal += $item['price'];
                                    }
                                }
                                $totalPrice = ($unitPrice * $food->quantity) + ($complimentaryTotal * $food->quantity) + $shippingCost;
                            @endphp


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
                                <td>
                                    @if($complimentaryItems && is_array($complimentaryItems))
                                        <ul>
                                            @foreach($complimentaryItems as $item)
                                                <li>{{ $item['name'] }}: ${{ $item['price'] }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        No items
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
                                    <input min="1" max="{{ $food->item->quantity }}" name="quantity" value="{{ $food->quantity }}" type="number" class="quantity-input" id="quantity-{{ $food->id }}">
                                    <p>Item Available: {{ $food->item->quantity }}</p>
                                </td>
                                <td class="total-price">
                                    ${{ number_format($totalPrice, 2) }}
                                </td>
                                <td><a href="{{ route('cart.delete', $food->id) }}"><i class="fas fa-times"></i></a></td>
                            </tr>
                        @endforeach
                        <tr class="text-right">
                            <td colspan="12">
                                <a href="{{ route('home') }}" class="bttn-small btn-fill-2 mr-3">Continue Shopping</a>
                                <button type="submit" href="{{ route('cart.update') }}" class="bttn-small btn-fill">Update Cart</button>
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
                            <a href="{{ route('checkout') }}" class="bttn-small btn-fill">Proceed to Checkout</a>
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
    document.addEventListener('DOMContentLoaded', function () {
        // Initial calculation of cart total
        updateCartTotals();

        // Loop through each quantity input and add validation
        document.querySelectorAll('.quantity-input').forEach(function(input) {
            const maxQuantity = parseInt(input.getAttribute('max'));
            const foodId = input.getAttribute('id').split('-')[1];  // Get food ID

            // Handle quantity changes
            input.addEventListener('input', function () {
                let quantity = parseInt(input.value);

                // Ensure the quantity doesn't exceed available stock
                if (quantity > maxQuantity) {
                    input.value = maxQuantity; // Set to max available
                } else if (quantity < 1) {
                    input.value = 1; // Set to minimum 1
                }

                // Update the total price of this row
                updateCartTotal(foodId, input.value);
                // Update the overall cart totals
                updateCartTotals();
            });
        });

        // Function to update the total price for each item
        function updateCartTotal(foodId, quantity) {
            const row = document.querySelector(`#quantity-${foodId}`).closest('tr');
            const unitPrice = parseFloat(row.querySelector('.unit-price').textContent.replace('$', '').trim());
            const complimentaryItems = row.querySelectorAll('.complimentary-item-price');
            let complimentaryItemsTotal = 0;

            // Calculate complimentary items total (multiply price by quantity)
            complimentaryItems.forEach(function(item) {
                complimentaryItemsTotal += parseFloat(item.textContent.replace('$', '').trim());
            });

            const shippingCost = parseFloat(row.querySelector('.shipping-charge').textContent.replace('$', '').trim()) || 0;

            // Calculate total price for this item
            const totalPrice = (unitPrice * quantity) + (complimentaryItemsTotal * quantity) + shippingCost;
            row.querySelector('.total-price').textContent = `$${totalPrice.toFixed(2)}`;
        }

        // Function to update the subtotal and total
        function updateCartTotals() {
            let subtotal = 0;
            let shippingTotal = 0;

            // Loop through each row and sum the total prices
            document.querySelectorAll('.total-price').forEach(function(item) {
                subtotal += parseFloat(item.textContent.replace('$', '').trim());
            });

            // Sum the shipping charges
            document.querySelectorAll('.shipping-charge').forEach(function(item) {
                shippingTotal += parseFloat(item.textContent.replace('$', '').trim()) || 0;
            });

            const total = subtotal + shippingTotal;

            // Update the subtotal and total fields in the new location
            document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('total').textContent = `$${total.toFixed(2)}`;
        }
    });
</script>



</body>
</html>