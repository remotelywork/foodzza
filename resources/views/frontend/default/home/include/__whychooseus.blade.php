@php
    $landingContent =\App\Models\LandingContent::where('type','whychooseus')->where('locale',app()->getLocale())->get();
@endphp

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
</section>
<!--/Why Choose Us-->
