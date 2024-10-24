@php
    $landingContents =\App\Models\LandingContent::where('type','about')->where('locale',app()->getLocale())->get();
@endphp

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
</section>
<!--/About Area-->