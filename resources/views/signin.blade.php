@extends('front_temp.layouts.app')

@section('title')



   التسجيل



@endsection

@section('about', 'active')

@section('content')

    <section class="sign-up">
        <div class="container">
            <ul class="ht-breadcrumbs ht-breadcrumbs--y-padding ht-breadcrumbs--b-border">
                <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">Home</span></a></li>
                <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">Pages</span></a></li>
                <li class="ht-breadcrumbs__item"><span class="ht-breadcrumbs__page">Login/Signup</span></li>
            </ul><!-- .ht-breadcrumb -->

            <div class="sign-up__container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="sign-up__header">
                            <h1 class="sign-up__textcontent"><a href="#log-in" class="sign-up__tab is-active">Sign In</a> <span>or</span> <a href="#sign-up" class="sign-up__tab">Sign Up</a></h1>
                        </div><!-- .sign-up__header -->

                        <div class="sign-up__main">
                            <form action="http://haintheme.com/demo/html/realand/sign_up.html" class="sign-up__form is-visible" id="log-in">
                                <label for="log-in-email" class="sign-up__label">Email</label>
                                <input type="email" class="sign-up__field" id="log-in-email" placeholder="Your e-mail goes here">
                                <label for="log-in-password" class="sign-up__label">Password</label>
                                <input type="password" class="sign-up__field" id="log-in-password" placeholder="******">
                                <button type="submit" class="sign-up__submit">Sign In</button>
                                <a href="#" class="sign-up__link" style="margin-left: 10px;">Forgot Password?</a>
                            </form><!-- .sign-up__form -->

                            <form action="http://haintheme.com/demo/html/realand/sign_up.html" class="sign-up__form" id="sign-up">
                                <label for="sign-up-name" class="sign-up__label">Name</label>
                                <input type="text" class="sign-up__field" id="sign-up-name" placeholder="Enter your full name">
                                <label for="sign-up-email" class="sign-up__label">Email</label>
                                <input type="email" class="sign-up__field" id="sign-up-email" placeholder="Your email goes here">
                                <label for="sign-up-password" class="sign-up__label">Password</label>
                                <input type="password" class="sign-up__field" id="sign-up-password" placeholder="******">
                                <div class="sign-up__wrapper">
                                    <input type="checkbox" for="sign-up-term" class="sign-up__checkbox">
                                    <label for="sign-up-term" class="sign-up__desc">I agree all statements in <a href="#">Terms of Service</a></label>
                                </div>

                                <button type="submit" class="sign-up__submit">Sign Up</button>
                            </form><!-- .sign-up__form -->
                        </div>
                    </div>
                </div><!-- .row -->
            </div><!-- .sign-up__container -->
        </div><!-- .container -->
    </section><!-- .sign-up -->
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