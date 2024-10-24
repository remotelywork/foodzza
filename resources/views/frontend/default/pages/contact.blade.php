@extends('frontend::pages.index')
@section('title')
    {{ $data['title'] }}
@endsection
@section('meta_keywords')
    {{ $data['meta_keywords'] }}
@endsection
@section('meta_description')
    {{ $data['meta_description'] }}
@endsection
<?php
$contact = \App\Models\Page::where('code', 'contact')->where('locale', app()->getLocale())->first();
$contactData = $contact ? json_decode($contact->data, true) : null;

?>
@section('page-content')

    <!--Main Content Area-->
    <section class="section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                    <div class="content-center">
                        <div class="account-form">
                            <div class="title">
                                <h3>Message us!</h3>
                            </div>
                            <form action="#">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <input type="text" placeholder="First Name" required>
                                    </div>
                                    <div class="col-xl-12">
                                        <input type="text" placeholder="Last Name" required>
                                    </div>
                                    <div class="col-xl-12">
                                        <input type="email" placeholder="Email" required>
                                    </div>
                                    <div class="col-xl-12">
                                        <input type="text" placeholder="Phone number" required>
                                    </div>
                                    <div class="col-xl-12">
                                        <textarea name="msg" rows="4" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-xl-12">
                                        <button type="submit" class="bttn-mid btn-fill w-100">Send it</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Main Content Area-->
@endsection
