<?php
    $testimonials = App\Models\Testimonial::all();
?>

<!-- Customer review section start -->
<section class="customer-review-section section-space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-5 col-xl-6 col-lg-6">
                <div class="section-title-wrapper text-center">
                    <h2 class="section-title section-title-space">{{ $data['title'] }}</h2>
                </div>
            </div>
        </div>
        <div class="customer-review-slider p-relative">
            <div class="swiper customer-review-slider-active">
                <div class="swiper-wrapper">
                    @foreach($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="customer-review-item">
                            <div class="quote">
                                <img src="assets/frontend/default/images/icons/quote.svg" alt="quote">
                            </div>
                            <div class="content">
                                <p class="description">{{ $testimonial->message }}</p>
                            </div>
                            <div class="admin-item">
                                <div class="admin-thumb">
                                    <img src="{{ asset($testimonial->picture) }}" alt="admin user">
                                </div>
                                <div class="admin-info">
                                    <h3 class="admin-title">{{ $testimonial->name }}</h3>
                                    <span class="admin-des">{{ $testimonial->designation }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- If we need pagination -->
                <div class="pagination-wrappper">
                    <div class="bd-swiper-dot text-center"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Customer review section end -->