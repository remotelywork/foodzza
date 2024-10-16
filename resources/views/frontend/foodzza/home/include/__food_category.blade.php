<!--Food Category-->
<section class="section-padding flower">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8 centered">
                <div class="section-title">
                    <h4>{{ __('All Foods') }}</h4>
                    <h2>{{ __('Our Food Items') }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <ul class="nav nav-pills mb-3 food-cat-tab" id="pills-tab" role="tablist">
                    @foreach($categories as $key => $category)
                    <li class="nav-item single-food-category" role="presentation">
                        <a class="nav-link @if($key == 0) active @endif" id="tab-{{ $key }}-tab" data-toggle="pill" href="#tab-{{ $key }}" role="tab" aria-controls="tab-one" aria-selected="true">
                            <img src="{{ asset($category->icon) }}" alt="">
                            <span>{{ $category->name }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    @foreach($categories as $key => $category)
                    <div class="tab-pane fade @if($key == 0) show active @endif" id="tab-{{ $key }}" role="tabpanel" aria-labelledby="tab-{{ $key }}-tab">
                        <div class="row">
                            @php
                                $foods = App\Models\Food::whereJsonContains('category',(string) $category->id)->get();
                            @endphp
                            @foreach($foods as $food)
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                    <div class="single-listed-food">
                                        <div class="img" style="width: 100%; height: 250px; overflow: hidden;">
                                            <a href="{{ route('food.details',$food->id) }}">
                                                <img src="{{ asset($food->thumb_image) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                            </a>
                                            <div class="wishlist"><a href="{{ route('add-to-cart', $food->id) }}" ><i class="fas fa-heart"></i></a></div>
                                        </div>
                                        <div class="item-details">
                                            <div class="restaurant-name-location">
                                                <a href="#">{{ $food->foodCategory->name }}</a>
                                            </div>
                                            <div class="title">
                                                <h3><a href="{{ route('food.details',$food->id) }}">{{ $food->name }}</a></h3>
                                            </div>
                                            <div class="des">
                                                <p>{{ $food->overview }}</p>
                                            </div>
                                            <div class="price-ratings">
                                                @if($food->discount_price != null)
                                                    <div class="price">{{ $currencySymbol }}{{ $food->discount_price }} <del>{{ $currencySymbol }}{{ $food->price }}</del></div>
                                                @else
                                                    <div class="price">{{ $currencySymbol }}{{ $food->price }} </div>
                                                @endif
                                                    <a href="{{ route('add-to-cart', $food->id) }}"
                                                       class="bttn-small btn-fill" @if(!\Illuminate\Support\Facades\Auth::check())
                                                       onclick="event.preventDefault(); alert('You must be logged in to add items to the cart.'); window.location.href='{{ route('login') }}';"
                                                            @endif >
                                                        Add to cart
                                                    </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section><!--/Food Category-->