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

    @php
        $blogs = \App\Models\Blog::where('locale',app()->getLocale())->latest()->paginate(9);
    @endphp

    <!--Blog-->
    <section class="section-padding">
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
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6">
                    <div class="single-blog-block">
                        <a href="blog-details.html">
                            <div class="thumb">
                                <img src="assets/images/blog/1.jpg" alt="">
                            </div>
                            <div class="title">
                                <h2>Top healthy food for evening</h2>
                            </div>
                            <div class="meta">
                                <div class="date">
                                    12th may, 2010
                                </div>
                                <div class="author">
                                    Robart husson
                                </div>
                            </div>
                            <div class="content">
                                <p>Nisi magnam iure, quis iusto ad expedita nulla? Rem minima exercitationem nesciunt ipsa, nemo doloribus voluptates dolore.</p>
                            </div>
                            <div class="read-more">
                                <span class="bttn-small btn-fill-2">Read more</span>
                            </div>
                        </a>
                    </div>
                    <div class="single-blog-block">
                        <a href="blog-details.html">
                            <div class="thumb">
                                <img src="assets/images/blog/2.jpg" alt="">
                            </div>
                            <div class="title">
                                <h2>Top healthy food for evening</h2>
                            </div>
                            <div class="meta">
                                <div class="date">
                                    12th may, 2021
                                </div>
                                <div class="author">
                                    Robart husson
                                </div>
                            </div>
                            <div class="content">
                                <p>Nisi magnam iure, quis iusto ad expedita nulla? Rem minima exercitationem nesciunt ipsa, nemo doloribus voluptates dolore.</p>
                            </div>
                            <div class="read-more">
                                <span class="bttn-small btn-fill-2">Read more</span>
                            </div>
                        </a>
                    </div>
                    <div class="single-blog-block">
                        <a href="blog-details.html">
                            <div class="thumb">
                                <img src="assets/images/blog/1.jpg" alt="">
                            </div>
                            <div class="title">
                                <h2>Top healthy food for evening</h2>
                            </div>
                            <div class="meta">
                                <div class="date">
                                    12th may, 2021
                                </div>
                                <div class="author">
                                    Robart husson
                                </div>
                            </div>
                            <div class="content">
                                <p>Nisi magnam iure, quis iusto ad expedita nulla? Rem minima exercitationem nesciunt ipsa, nemo doloribus voluptates dolore.</p>
                            </div>
                            <div class="read-more">
                                <span class="bttn-small btn-fill-2">Read more</span>
                            </div>
                        </a>
                    </div>
                    <div class="single-blog-block">
                        <a href="blog-details.html">
                            <div class="thumb">
                                <img src="assets/images/blog/2.jpg" alt="">
                            </div>
                            <div class="title">
                                <h2>Top healthy food for evening</h2>
                            </div>
                            <div class="meta">
                                <div class="date">
                                    12th may, 2021
                                </div>
                                <div class="author">
                                    Robart husson
                                </div>
                            </div>
                            <div class="content">
                                <p>Nisi magnam iure, quis iusto ad expedita nulla? Rem minima exercitationem nesciunt ipsa, nemo doloribus voluptates dolore.</p>
                            </div>
                            <div class="read-more">
                                <span class="bttn-small btn-fill-2">Read more</span>
                            </div>
                        </a>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--/Blog-->

    <!-- Newsletter section start -->
    @include('frontend::pages.newsletter')
    <!-- Newsletter section end -->
@endsection
