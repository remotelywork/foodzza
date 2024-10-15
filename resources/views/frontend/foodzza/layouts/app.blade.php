@include('frontend.foodzza.include.__head')

@include('frontend.foodzza.include.__header')
<!-- Banner Area-->
<div class="hero owl-carousel leaf-left flower">
    <section class="banner-slider-area section-padding yellow-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-md-12">
                    <div class="banner">
                        <h2>Best Burger in Town</h2>
                        <p>Poke is diced raw fish served either as an appetizer or as a <br> main course and is one of the main dishes of Native <br> Hawaiian cuisine. Traditional forms are aku and heʻe.</p>
                        <a href="#" class="bttn-mid btn-fill cart-button"><i class="fas fa-shopping-cart"></i>Order now</a>
                        <div class="social">
                            <a href=""><i class="fab fa-facebook-square"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="pagename">
                            <span class="number">01</span>
                            <span class="name">Burger</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-md-12">
                    <div class="banner">
                        <img src="{{ asset('frontend/default/images/food.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="banner-slider-area section-padding yellow-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-md-12">
                    <div class="banner">
                        <h2>Top Class Pizzaburgi</h2>
                        <p>Poke is diced raw fish served either as an appetizer or as a <br> main course and is one of the main dishes of Native <br> Hawaiian cuisine. Traditional forms are aku and heʻe.</p>
                        <a href="" class="bttn-mid btn-fill"><i class="fas fa-shopping-cart"></i>Order now</a>
                        <div class="social">
                            <a href=""><i class="fab fa-facebook-square"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="pagename">
                            <span class="number">02</span>
                            <span class="name">Pizza</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-md-12">
                    <div class="banner">
                        <img src="assets/images/food-2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="banner-slider-area section-padding blue-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-md-12">
                    <div class="banner">
                        <h2>Hot Pasta you Love!</h2>
                        <p>Poke is diced raw fish served either as an appetizer or as a <br> main course and is one of the main dishes of Native <br> Hawaiian cuisine. Traditional forms are aku and heʻe.</p>
                        <a href="" class="bttn-mid btn-fill"><i class="fas fa-shopping-cart"></i>Order now</a>
                        <div class="social">
                            <a href=""><i class="fab fa-facebook-square"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="pagename">
                            <span class="number">03</span>
                            <span class="name">Pasta</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-md-12">
                    <div class="banner">
                        <img src="assets/images/food-3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><!-- /Banner Area-->


<!--About Area-->
<section class="section-padding-2">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 cl-black mb-30">
                <div class="section-title">
                    <h4>Who we are</h4>
                    <h2>About Our Restaurant</h2>
                </div>
                <div class="about-us-content">
                    <p>Amet consectetur adipisicing elit. Earum, veniam. Quisquam dicta, atque nemo error impedit necessitatibus, incidunt rem architecto optio facilis aut illo labore numquam et soluta quo. Ratione! Lorem ipsum dolor sit amet consectetur adipisicing elit. <br> <br> Exercitationem aliquam amet nulla eius voluptates rem numquam ipsa, dolores ratione soluta quo tempora, quis sit. Amet fugit autem nobis officiis eius. Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde amet atque, possimus reiciendis totam distinctio ducimus corporis aut voluptas odio molestiae commodi? Eligendi, suscipit ullam voluptatibus inventore nesciunt molestias voluptas.</p>
                    <a href="about.html" class="bttn-mid btn-fill">Explore more</a>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                <div class="about-img">
                    <img src="{{ asset('frontend/default/images/about.jpg') }}" alt="">
                    <a href="https://www.youtube.com/watch?v=DJyxwIGdl8Y" class="video-popup"><i class="fa fa-play"></i></a>
                </div>
            </div>
        </div>
    </div>
</section><!--/About Area-->

<!--pack Area-->
<section class="pack-section">
    <div class="single-pack one">
        <h3>Burger Package</h3>
        <p>Placeat sit excepturi sapiente <br> reiciendis quo sed adip</p>
        <a href="shop.html" class="bttn-mid btn-emt">Shop Now</a>
        <img src="{{ asset('frontend/default/images/food.png') }}" alt="">
    </div>
    <div class="single-pack two">
        <h3>Pizza Package</h3>
        <p>Placeat sit excepturi sapiente <br> reiciendis quo sed adip</p>
        <a href="shop.html" class="bttn-mid btn-emt">Shop Now</a>
        <img src="{{ asset('frontend/default/images/food-2.png') }}" alt="">
    </div>
    <div class="single-pack three">
        <h3>Pasta Package</h3>
        <p>Placeat sit excepturi sapiente <br> reiciendis quo sed adip</p>
        <a href="shop.html" class="bttn-mid btn-emt">Shop Now</a>
        <img src="{{ asset('frontend/default/images/food-3.png') }}" alt="">
        {{--<img src="{{ asset('frontend/default/images/food.png') }}" alt="">--}}
    </div>
</section><!--/pack Area-->

<!--Why Choose Us-->
<section class="section-padding-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 centered">
                <div class="section-title mb-60">
                    <h4>We're Special</h4>
                    <h2>Why People Love us?</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-why-choose">
                    <div class="icon">
                        <img src="{{ asset('frontend/default/images/icons/1.png') }}" alt="">
                    </div>
                    <div class="title">
                        <h3>Stable Useability</h3>
                    </div>
                    <p>Voluptatibus, fugiat. Perspiciatis libero saepe ullam rem qui</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-why-choose">
                    <div class="icon">
                        <img src="{{ asset('frontend/default/images/icons/2.png') }}" alt="">
                    </div>
                    <div class="title">
                        <h3>Different Wallet</h3>
                    </div>
                    <p>Voluptatibus, fugiat. Perspiciatis libero saepe ullam rem qui</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-why-choose">
                    <div class="icon">
                        <img src="{{ asset('frontend/default/images/icons/3.png') }}" alt="">
                    </div>
                    <div class="title">
                        <h3>Multiple Currency</h3>
                    </div>
                    <p>Voluptatibus, fugiat. Perspiciatis libero saepe ullam rem qui</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-why-choose">
                    <div class="icon">
                        <img src="{{ asset('frontend/default/images/icons/4.png') }}" alt="">
                    </div>
                    <div class="title">
                        <h3>Low Rate</h3>
                    </div>
                    <p>Voluptatibus, fugiat. Perspiciatis libero saepe ullam rem qui</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-why-choose">
                    <div class="icon">
                        <img src="{{ asset('frontend/default/images/icons/5.png') }}" alt="">
                    </div>
                    <div class="title">
                        <h3>Different Wallet</h3>
                    </div>
                    <p>Voluptatibus, fugiat. Perspiciatis libero saepe ullam rem qui</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-why-choose">
                    <div class="icon">
                        <img src="{{ asset('frontend/default/images/icons/6.png') }}" alt="">
                    </div>
                    <div class="title">
                        <h3>Multiple Currency</h3>
                    </div>
                    <p>Voluptatibus, fugiat. Perspiciatis libero saepe ullam rem qui</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-why-choose">
                    <div class="icon">
                        <img src="{{ asset('frontend/default/images/icons/7.png') }}" alt="">
                    </div>
                    <div class="title">
                        <h3>Low Rate</h3>
                    </div>
                    <p>Voluptatibus, fugiat. Perspiciatis libero saepe ullam rem qui</p>
                </div>
            </div>
        </div>
    </div>
</section><!--/Why Choose Us-->


@include('frontend.foodzza.home.include.__food_category')

<!-- Modal for wishlist -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Login Your Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="account-form">
                    <div class="via-login">
                        <a href="" class="facebook-bg"><i class="fab fa-facebook-f"></i></a>
                        <a href="" class="google-plus-bg"><i class="fab fa-google"></i></a>
                        <a href="" class="linkedin-bg"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <form action="#">
                        <div class="row">
                            <div class="col-xl-12">
                                <input type="text" placeholder="Username" required>
                            </div>
                            <div class="col-xl-12">
                                <input type="password" placeholder="Password" required>
                            </div>

                            <div class="col-xl-12">
                                <button type="submit" class="bttn-mid btn-fill w-100">Login Account</button>
                            </div>
                            <div class="col-xl-12">
                                <p><a href="forgot-password.html">Forgot password</a> | <a href="register.html">Create account</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- /Modal for wishlist -->


<!-- Counter Area -->
<section class="section-padding-2 dark-overlay" style="background: url('assets/images/banner-2.jpg') no-repeat fixed;">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-new-counter">
                    <img src="{{ asset('frontend/default/images/icons/8.png') }}" alt="">
                    <h3 class="count">5246</h3>
                    <h5>Food Sold</h5>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-new-counter">
                    <img src="{{ asset('frontend/default/images/icons/9.png') }}" alt="">
                    <h3 class="count">2001</h3>
                    <h5>Since we're</h5>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-new-counter">
                    <img src="{{ asset('frontend/default/images/icons/10.png') }}" alt="">
                    <h3 class="count">68</h3>
                    <h5>Menu Items</h5>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-new-counter">
                    <img src="{{ asset('frontend/default/images/icons/11.png') }}" alt="">
                    <h3>$<span class="count">11.5</span>M</h3>
                    <h5>Total sell</h5>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Counter Area -->


<!-- Popular Items -->
<section class="section-padding-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="section-title">
                    <h4>Best Selling</h4>
                    <h2>Popular Foods</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="popular-items owl-carousel">
                    <div class="single-listed-food">
                        <div class="img">
                            <a href=""><img src="{{ asset('frontend/default/images/items/1.jpg') }}" alt=""></a>
                            <div class="wishlist"><a href="" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-heart"></i></a></div>
                            <div class="ratings">4.6</div>
                            <div class="discount-rate">10% off</div>
                        </div>
                        <div class="item-details">
                            <div class="restaurant-name-location">
                                <a href=""><i class="fas fa-hamburger"></i>Burger</a>
                            </div>
                            <div class="title">
                                <h3><a href="">Samusage pasta lit</a></h3>
                            </div>
                            <div class="des">
                                <p>Wibusdam voluptates quas velit quis dignissimos iure at asperiores delectus dicta blanditiis</p>
                            </div>
                            <div class="price-ratings">
                                <div class="price">$26.08 <del>$32.5</del></div>
                                <a href="" class="bttn-small btn-fill">Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-listed-food">
                        <div class="img">
                            <a href=""><img src="{{ asset('frontend/default/images/items/1.jpg') }}" alt=""></a>
                            <div class="wishlist"><a href="" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-heart"></i></a></div>
                            <div class="ratings">4.6</div>
                            <div class="discount-rate">10% off</div>
                        </div>
                        <div class="item-details">
                            <div class="restaurant-name-location">
                                <a href=""><i class="fas fa-pizza-slice"></i>Pizza</a>
                            </div>
                            <div class="title">
                                <h3><a href="">Samusage pasta lit</a></h3>
                            </div>
                            <div class="des">
                                <p>Wibusdam voluptates quas velit quis dignissimos iure at asperiores delectus dicta blanditiis</p>
                            </div>
                            <div class="price-ratings">
                                <div class="price">$26.08 <del>$32.5</del></div>
                                <a href="cart.html" class="bttn-small btn-fill">Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-listed-food">
                        <div class="img">
                            <a href=""><img src="{{ asset('frontend/default/images/items/2.jpg') }}" alt=""></a>
                            <div class="wishlist"><a href=""><i class="fas fa-heart"></i></a></div>
                            <div class="ratings">4.6</div>
                            <div class="discount-rate">10% off</div>
                        </div>
                        <div class="item-details">
                            <div class="restaurant-name-location">
                                <a href=""><i class="fas fa-pizza-slice"></i>Pizza</a>
                            </div>
                            <div class="title">
                                <h3><a href="">Samusage pasta lit</a></h3>
                            </div>
                            <div class="des">
                                <p>Wibusdam voluptates quas velit quis dignissimos iure at asperiores delectus dicta blanditiis</p>
                            </div>
                            <div class="price-ratings">
                                <div class="price">$26.08 <del>$32.5</del></div>
                                <a href="cart.html" class="bttn-small btn-fill">Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-listed-food">
                        <div class="img">
                            <a href=""><img src="{{ asset('frontend/default/images/items/3.jpg') }}" alt=""></a>
                            <div class="wishlist"><a href=""><i class="fas fa-heart"></i></a></div>
                            <div class="ratings">4.6</div>
                            <div class="discount-rate">10% off</div>
                        </div>
                        <div class="item-details">
                            <div class="restaurant-name-location">
                                <a href=""><i class="fas fa-pizza-slice"></i>Pizza</a>
                            </div>
                            <div class="title">
                                <h3><a href="">Samusage pasta lit</a></h3>
                            </div>
                            <div class="des">
                                <p>Wibusdam voluptates quas velit quis dignissimos iure at asperiores delectus dicta blanditiis</p>
                            </div>
                            <div class="price-ratings">
                                <div class="price">$26.08 <del>$32.5</del></div>
                                <a href="cart.html" class="bttn-small btn-fill">Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-listed-food">
                        <div class="img">
                            <a href=""><img src="{{ asset('frontend/default/images/items/2.jpg') }}" alt=""></a>
                            <div class="wishlist"><a href=""><i class="fas fa-heart"></i></a></div>
                            <div class="ratings">4.6</div>
                            <div class="discount-rate">10% off</div>
                        </div>
                        <div class="item-details">
                            <div class="restaurant-name-location">
                                <a href=""><i class="fas fa-pizza-slice"></i>Pizza</a>
                            </div>
                            <div class="title">
                                <h3><a href="">Samusage pasta lit</a></h3>
                            </div>
                            <div class="des">
                                <p>Wibusdam voluptates quas velit quis dignissimos iure at asperiores delectus dicta blanditiis</p>
                            </div>
                            <div class="price-ratings">
                                <div class="price">$26.08 <del>$32.5</del></div>
                                <a href="cart.html" class="bttn-small btn-fill">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Popular Items -->

<!--CTA Section-->
<section class="section-padding dark-overlay" style="background: url('assets/images/banner-3.jpg') no-repeat center center fixed;">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-sm-12 centered cl-white">
                <div class="mobile-app">
                    <h2>Book your table with your sutable date</h2>
                    <div class="app">
                        <a href="" class="bttn-mid btn-fill"><i class="fas fa-border-all"></i>Reservation</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/CTA Section-->

<!--User Review Section-->
<section class="section-padding-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 centered">
                <div class="section-title">
                    <h4>What our client says</h4>
                    <h2>Some words from them</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-sm-6">
                <div class="single-user-review">
                    <div class="quote-icon">
                        <img src="{{ asset('frontend/default/images/quote.png') }}" alt="">
                    </div>
                    <div class="review">
                        <p>Got a multiple time food delivery from them, it's amazing fast and get what I expect. Highly Recomended!!</p>
                    </div>
                    <div class="reviewer-thumb">
                        <img src="{{ asset('frontend/default/images/reviewer/1.jpg') }}" alt="">
                        <p>Astron haat</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="single-user-review">
                    <div class="quote-icon">
                        <img src="{{ asset('frontend/default/images/quote.png') }}" alt="">
                    </div>
                    <div class="review">
                        <p>Got a multiple time food delivery from them, it's amazing fast and get what I expect. Highly Recomended!!</p>
                    </div>
                    <div class="reviewer-thumb">
                        <img src="{{ asset('frontend/default/images/reviewer/2.jpg') }}" alt="">
                        <p>Astron haat</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="single-user-review">
                    <div class="quote-icon">
                        <img src="{{ asset('frontend/default/images/quote.png') }}" alt="">
                    </div>
                    <div class="review">
                        <p>Got a multiple time food delivery from them, it's amazing fast and get what I expect. Highly Recomended!!</p>
                    </div>
                    <div class="reviewer-thumb">
                        <img src="{{ asset('frontend/default/images/reviewer/3.jpg') }}" alt="">
                        <p>Astron haat</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/User Review Section-->

<!--Reservation Section-->
<section class="section-padding gray-bg leaf-left flower">
    <div class="container">
        <div class="row">
            <div class="col centered">
                <div class="section-title">
                    <h4>Book a table</h4>
                    <h2>Reservation</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="reservation-form">
                    <form action="#">
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="single-box">
                                    <label for="name">Name</label>
                                    <input type="text" id="name">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="single-box">
                                    <label for="email">Email</label>
                                    <input type="email" id="email">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="single-box">
                                    <label for="people">Number Of People</label>
                                    <select name="people" id="people">
                                        <option value="">2</option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                        <option value="">5</option>
                                        <option value="">6</option>
                                        <option value="">7</option>
                                        <option value="">8</option>
                                        <option value="">9</option>
                                        <option value="">10</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="single-box">
                                    <label for="item">Interested Meal</label>
                                    <select name="item" id="item">
                                        <option value="">Burger</option>
                                        <option value="">Pizza</option>
                                        <option value="">Pasta</option>
                                        <option value="">Naga Drum</option>
                                        <option value="">Soup</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-12">
                                <div class="single-box">
                                    <label for="msg">Your Message</label>
                                    <textarea name="msg" rows="5" id="msg"></textarea>
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-12">
                                <button class="bttn-mid btn-fill">Reserve now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!--/Reservation Section-->
@include('frontend.foodzza.home.include.__newsletter')

@include('frontend.foodzza.include.__footer')

@include('frontend.foodzza.include.__script')

</body>
</html>