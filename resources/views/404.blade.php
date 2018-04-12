@extends('front_temp.layouts.app')

@section('content')
    <section class="error">
        <div class="container">
            <ul class="ht-breadcrumbs ht-breadcrumbs--y-padding ht-breadcrumbs--b-border">
                <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">Home</span></a></li>
                <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">Pages</span></a></li>
                <li class="ht-breadcrumbs__item"><span class="ht-breadcrumbs__page">404 Error</span></li>
            </ul><!-- ht-breadcrumb -->

            <div class="error-404__main">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('home/images/uploads/404.jpg') }}" alt="404">
                    </div><!-- error-404__img -->

                    <div class="col-md-6">
                        <h1 class="error-404__title">Whoops!</h1>
                        <div class="error-404__detail">
                            <h2 class="error-404__explain">Looks like something's broken here.</h2>
                            <p class="error-404__desc">The page you were looking for could not be found. Head back home, or</p>
                        </div><!-- .error-404__detail -->

                        <a href="#" class="error-404__cta">Search</a>
                    </div><!-- .error-404__content -->
                </div><!-- .row -->
            </div><!-- .error-404__main -->
        </div><!-- .container -->
    </section><!-- .error-404 -->
    <section class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-md-6 newsletter__content">
                    <img src="{{ asset('home/images/icon_mail.png') }}" alt="Newsletter" class="newsletter__icon">
                    <div class="newsletter__text-content">
                        <h2 class="newsletter__title">Newsletter</h2>
                        <p class="newsletter__desc">Sign up for our newsletter to get up-to-date from us</p>
                    </div>
                </div><!-- .col -->

                <div class="col-md-6">
                    <form action="http://haintheme.com/demo/html/realand/index.html" class="newsletter__form">
                        <input type="email" class="newsletter__field" placeholder="Enter Your E-mail">
                        <button type="submit" class="newsletter__submit">Subscribe</button>
                    </form>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .newsletter -->
@endsection