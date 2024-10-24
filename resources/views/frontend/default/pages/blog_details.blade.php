@extends('frontend::pages.index')
@section('title')
    {{ $data->title }}
@endsection
@section('meta_keywords')
    {{ $data['meta_keywords'] }}
@endsection
@section('meta_description')
    {{ $data['meta_description'] }}
@endsection
@section('page-content')
    <!--Blog Area-->
    <section class="blog-area section-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                    <div class="site-sidebar">
                        <div class="single-sidebar">
                            <h3>Search</h3>
                            <form action="#">
                                <input type="text" placeholder="Search" required>
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="single-sidebar">
                            <h3>Important topic</h3>
                            <ul>
                                <li><a href="">Healthy Food</a></li>
                                <li><a href="">Daily Exercise</a></li>
                                <li><a href="">Cook Rice</a></li>
                                <li><a href="">Rish Curry</a></li>
                                <li><a href="">How to make grill</a></li>
                            </ul>
                        </div>
                        <div class="single-sidebar">
                            <h3>Social Pages</h3>
                            <div class="social-follow">
                                <a href="" class="facebook-bg"><i class="fab fa-facebook-f"></i></a>
                                <a href="" class="twitter-bg"><i class="fab fa-twitter"></i></a>
                                <a href="" class="instagram-bg"><i class="fab fa-instagram"></i></a>
                                <a href="" class="linkedin-bg"><i class="fab fa-linkedin"></i></a>
                                <a href="" class="pinterest-bg"><i class="fab fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                    <div class="blog-details">
                        <img class="big-thumb" src="assets/images/blog/1.jpg" alt="">
                        <p>Eagerness it delighted pronounce repulsive furniture no. Excuse few the remain highly feebly add people manner say. Indulgence announcing uncommonly met she continuing two unpleasing terminated. Now busy say down the shed eyes roof paid her. Of shameless collected suspicion existence in. Share walls stuff think but the arise guest. <br><br>Cultivated who resolution connection motionless did occasional. Journey promise if it colonel. Can all mirth abode nor hills added. Them men does for body pure. Far end not horses remain sister. Mr parish is to he answer roused piqued afford sussex. It abode words began enjoy years no do no. Tried spoil as heart visit blush or. Boy possible blessing sensible set but margaret interest. Off tears are day blind smile alone had.</p>
                        <h5 class="mb-10">Learn how will you win easily</h5>
                        <p>Few the remain highly feebly add people manner say. Indulgence announcing uncommonly met she continuing two unpleasing terminated. Now busy say down the shed eyes roof paid her. Of shameless collected suspicion existence in. Share walls stuff think but the arise guest. <br><br>Cultivated who resolution connection motionless did occasional. Journey promise if it colonel. Can all mirth abode nor hills added. Them men does for body pure. Far end not horses remain sister. Mr parish is to he answer roused piqued afford sussex. It abode words began enjoy years no do no. Tried spoil as heart visit blush or. Boy possible blessing sensible set but margaret interest. Off tears are day blind smile alone had.</p>
                        <h5 class="mb-20">Learn how will you win easily</h5>
                        <img class="big-thumb" src="assets/images/blog/2.jpg" alt="">
                        <blockquote class="blockquote">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo
                            viverra maecenas accumsan lacus vel facilisis
                        </blockquote>
                        <div class="row">
                            <div class="col-xl-6 col-sm-12">
                                <img class="big-thumb" src="assets/images/blog/1.jpg" alt="">
                            </div>
                            <div class="col-xl-6 col-sm-12">
                                <img class="big-thumb" src="assets/images/blog/2.jpg" alt="">
                            </div>
                        </div>
                        <p>Ipsum dolor sit amet, consectetur adipisicing elit. Ullam obcaecati mollitia, non nostrum libero ipsam nisi illum animi perferendis eius temporibus modi voluptate blanditiis nobis dolor neque earum. Rerum, repellendus <br><br>Ladies others the six desire age. Bred am soon park past read by lain. As excuse eldest no moment. An delight beloved up garrets am cottage private. The far attachment discovered celebrated decisively surrounded for and. Sir new the particular frequently indulgence excellence how. Wishing an if he sixteen visited tedious subject it. Ladies others the six desire age. Bred am soon park past read by lain. As excuse eldest no moment. An delight beloved up garrets am cottage private. The far attachment discovered celebrated decisively surrounded for and. Sir new the particular frequently indulgence excellence how. Wishing an if he sixteen visited tedious subject it.</p>
                    </div>
                    <div class="post-share-and-tag row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="social">
                                <span>Share:</span>
                                <a href="" class="cl-facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="" class="cl-twitter"><i class="fab fa-twitter"></i></a>
                                <a href="" class="cl-youtube"><i class="fab fa-youtube"></i></a>
                                <a href="" class="cl-pinterest"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Blog Area-->

@endsection
