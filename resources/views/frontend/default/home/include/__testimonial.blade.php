<?php
    $testimonials = App\Models\Testimonial::all();
?>

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
</section>
<!--/User Review Section-->