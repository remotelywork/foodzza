
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('frontend/default/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('frontend/default/js/jquery-migrate.js') }}"></script>
<script src="{{ asset('frontend/default/js/jquery-ui.js') }}"></script>

<script src="{{ asset('frontend/default/js/popper.js') }}"></script>
<script src="{{ asset('frontend/default/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/default/js/owl.carousel.min.js') }}"></script>

<script src="{{ asset('frontend/default/js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/default/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/default/js/isotope.pkgd.min.js') }}"></script>

<script src="{{ asset('frontend/default/js/waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/default/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('frontend/default/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/default/js/scrollUp.min.js') }}"></script>

<script src="{{ asset('frontend/default/js/cartsidebar.js') }}"></script>
<script src="{{ asset('frontend/default/js/script.js') }}"></script>


<script>
    document.addEventListener('DOMContentLoaded',function () {
        const successAlert = document.getElementById('success-alert');
        const failedAlert = document.getElementById('failed-alert')
        if (successAlert){
           setTimeout(function () {
               successAlert.style.display = 'none';
           },3000)
        }
        if (failedAlert){
            setTimeout(function () {
                failedAlert.style.display = 'none'
            },3000)
        }
    })
</script>
@notifyCss
@notifyJs
