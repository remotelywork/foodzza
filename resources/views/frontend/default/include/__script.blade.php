
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
{{--@notifyCss--}}
{{--@notifyJs--}}










{{--<script>--}}
    {{--"use strict";--}}

    {{--// Color Switcher--}}
    {{--$(".color-switcher").on('click', function () {--}}
        {{--$("body").toggleClass("dark-theme");--}}
        {{--var url = '{{ route("mode-theme") }}';--}}
        {{--$.get(url);--}}
    {{--});--}}
{{--</script>--}}

{{--@include('global.__t_notify')--}}
{{--@if(auth()->check())--}}
    {{--<script src="{{ asset('global/js/pusher.min.js') }}"></script>--}}
    {{--@include('global.__notification_script',['for'=>'user','userId' => auth()->user()->id])--}}
{{--@endif--}}

{{--@stack('js')--}}
{{--@php--}}
    {{--$googleAnalytics = plugin_active('Google Analytics');--}}
    {{--$tawkChat = plugin_active('Tawk Chat');--}}
    {{--$fb = plugin_active('Facebook Messenger');--}}
{{--@endphp--}}

{{--@if($googleAnalytics)--}}
    {{--@include('frontend::plugin.google_analytics',['GoogleAnalyticsId' => json_decode($googleAnalytics?->data,true)['app_id']])--}}
{{--@endif--}}
{{--@if($tawkChat)--}}
    {{--@include('frontend::plugin.tawk',['data' => json_decode($tawkChat->data, true)])--}}
{{--@endif--}}
{{--@if($fb)--}}
    {{--@include('frontend::plugin.fb',['data' => json_decode($fb->data, true)])--}}
{{--@endif--}}

