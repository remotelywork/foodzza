@include('frontend.foodzza.include.__head')
@include('frontend.foodzza.include.__header')
<!--Custom Banner-->
<section class="custom-banner yellow-bg flower">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 centered">
                <div class="banner-title">
                    <h3>{{ __('User Panel') }}</h3>
                </div>
            </div>
        </div>
    </div>
</section><!--Custom Banner-->

<!--My Orders-->
<section class="section-padding gray-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8">
                <div class="section-title">
                    <h2>{{ __('My Orders') }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6">
                <div class="back-sidemenu">
                    <ul>
                        <li><a href="user-orders.html">{{__('Orders')}}</a></li>
                        <li><a href="settings.html">{{ __('Settings') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Food Image</th>
                            <th scope="col">Food Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Delivery man</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><img src="assets/images/items/1.jpg" alt=""></td>
                            <td>Avocado cooked delicious fish dish</td>
                            <td>17/07/2020</td>
                            <td>$10.8</td>
                            <td><span class="pendding">Pendding</span></td>
                            <td>Haris pa</td>
                        </tr>
                        <tr>
                            <td><img src="assets/images/items/2.jpg" alt=""></td>
                            <td>Avocado cooked delicious fish dish</td>
                            <td>17/07/2020</td>
                            <td>$10.8</td>
                            <td><span class="delivered">Delivered</span></td>
                            <td>Jhon lee</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-8 col-sm-6">
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
</section><!--/My Orders-->
@include('frontend.foodzza.include.__footer')



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
@include('frontend.foodzza.include.__script')
</body>
</html>