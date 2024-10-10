@include('frontend.foodzza.include.__head')
@include('frontend.foodzza.include.__header')

<!--Custom Banner-->
<section class="custom-banner yellow-bg flower">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 centered">
                <div class="banner-title">
                    <h3>Product Details page</h3>
                </div>
            </div>
        </div>
    </div>
</section><!--Custom Banner-->


<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-md-7 col-sm-12">
                <div class="product-details-img mb-30">
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-4">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                @foreach($food_details->images as $index => $image)
                                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="v-pills-{{ $index }}-tab" data-toggle="pill" href="#v-pills-{{ $index }}" role="tab" aria-controls="v-pills-{{ $index }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                        <img src="{{ asset($image) }}" alt="">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-8 col-sm-8 col-8">
                            <div class="tab-content" id="v-pills-tabContent">
                                @foreach($food_details->images as $index => $image)
                                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="v-pills-{{ $index }}" role="tabpanel" aria-labelledby="v-pills-{{ $index }}-tab">
                                        <img class="magniflier" src="{{ asset($image) }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-5 col-md-5 col-sm-12">
                <div class="product-details-content">
                    <h2>{{ $food_details->name }}</h2>
                    <div class="brand">
                        <a href="">{{ $food_details->foodCategory->name }}</a>
                    </div>
                    <div class="stock">{{ $food_details->quantity }} Items Available</div>
                    <div class="price">
                        @if($food_details->discount_price != null)
                            <div class="price">{{ $currencySymbol }}{{ $food_details->discount_price }} <del>{{ $currencySymbol }}{{ $food_details->price }}</del></div>
                        @else
                            <div class="price">{{ $currencySymbol }} {{ $food_details->price }} </div>
                        @endif
                    </div>

                    <div class="quantity">
                        <a href="#" class="quantity__minus"><span>-</span></a>
                        <input name="quantity" type="text" class="quantity__input" value="1">
                        <a href="#" class="quantity__plus"><span>+</span></a>
                    </div>
                    <div class="overview">
                        <strong>Overview:</strong>
                        <p>{{ $food_details->overview }}</p>
                        @if($food_details->complimentary_items != null)
                            <strong>Add more:</strong>
                            @foreach($food_details->complimentary_items as $item)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">{{ $item['name'] }} + <span>${{ $item['price'] }}</span></label>
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="btns mb-20">
                        <a href="" class="bttn-mid btn-fill-2 mr-2"><i class="fas fa-shopping-cart"></i>Add to Cart</a>
                        <a href="" class="bttn-mid btn-fill">Buy now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Related Items -->
<section class="section-padding-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="section-title">
                    <h2>Related Foods</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="popular-items owl-carousel">
                    @foreach($releted_items as $releted_item)
                        <div class="single-listed-food">
                            <div class="img" style="width: 100%; height: 250px; overflow: hidden;">
                                <a href="{{ route('food.details',$releted_item->id) }}">
                                    <img src="{{ asset($releted_item->thumb_image) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                </a>
                                <div class="wishlist"><a href="" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-heart"></i></a></div>
                            </div>
                            <div class="item-details">
                                <div class="restaurant-name-location">
                                    <a href="category.html"><i class="fas fa-hamburger"></i>{{ $releted_item->foodCategory->name }}</a>
                                </div>
                                <div class="title">
                                    <h3><a href="{{ route('food.details',$releted_item->id) }}">{{ $releted_item->name }}</a></h3>
                                </div>
                                <div class="des">
                                    <p>{{ $releted_item->overview }}</p>
                                </div>
                                <div class="price-ratings">
                                    @if($releted_item->discount_price != null)
                                        <div class="price">{{ $currencySymbol }}{{ $releted_item->discount_price }} <del>{{ $currencySymbol }}{{ $releted_item->price }}</del></div>
                                    @else
                                        <div class="price">{{ $currencySymbol }}{{ $releted_item->price }} </div>
                                    @endif
                                    <a href="cart.html" class="bttn-small btn-fill">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section><!-- /Related Items -->

@include('frontend.foodzza.include.__footer')



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
@include('frontend.foodzza.include.__script')
</body>
</html>