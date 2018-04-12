@extends('front_temp.layouts.app')

@section('title')



    عن الشركه



@endsection

@section('about', 'active')

@section('content')

    <section class="about-us">
        <div class="container">
            <ul class="ht-breadcrumbs ht-breadcrumbs--y-padding ht-breadcrumbs--b-border">
                <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">@lang('home.home')</span></a></li>
                <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">@lang('home.pages')</span></a></li>
                <li class="ht-breadcrumbs__item"><span class="ht-breadcrumbs__page">@lang('home.about')</span></li>
            </ul><!-- ht-breadcrumb -->

            <div class="about-us__main">
                <div class="row">
                    <main class="col-md-8 col-md-main">
                        <div class="about-us__img">
                            <img src="{{ asset('home/images/uploads/about_us.jpg') }}" alt="About us">
                        </div><!-- .about-us__img -->
                        <h1 class="about-us__title">We are ReaLand</h1>
                        <p>
                            Our mission is to redefine real estate in the customer's favor.
                        </p>
                        <p>
                            ReaLand got its start inventing map-based search. Everyone told us the easy money was in running ads for traditional brokers, but we couldn't stop thinking about how different real estate would be if it were designed from the ground up, using technology and totally different values, to put customers first. So we joined forces with agents who wanted to be customer advocates, not salesmen.
                        </p>
                        <p>
                            Since these were our own agents, we could survey each customer on our service and pay a bonus based on the review. We deepened our technology beyond the initial search to make the home tour, the listing debut, the escrow process, the whole process, faster, easier and worry-free. And we gave customers more value, not just by saving each thousands in fees, but by investing in every home we sell, by measuring our performance and improving constantly.
                        </p>

                        <p>
                            This is how real estate would be if it were designed just for you, because, well, it was.
                        </p>
                    </main><!-- .col -->
                    <aside class="col-md-4 col-md-sidebar">
                        <section class="widget">
                            <form class="contact-form contact-form--bordered contact-form--wild-sand">
                                <div class="contact-form__header">
                                    <h3 class="contact-form__title">@lang('home.contact_us')</h3>
                                </div><!-- .contact-form__header -->

                                <div class="contact-form__body">
                                    <input type="text" class="contact-form__field" placeholder="@lang('home.name')" name="name" required>
                                    <input type="email" class="contact-form__field" placeholder="@lang('home.email')" name="email" required>
                                    <input type="tel" class="contact-form__field" placeholder="@lang('home.phone_number')" name="phone number">
                                    <textarea class="contact-form__field contact-form__comment" cols="30" rows="4" placeholder="@lang('home.comment')" name="comment" required></textarea>
                                </div><!-- .contact-form__body -->

                                <div class="contact-form__footer">
                                    <input type="submit" class="contact-form__submit" name="submit" value="@lang('home.send_msg')">
                                </div><!-- .contact-form__footer -->
                            </form><!-- .contact-form -->
                        </section><!-- .widget -->


                    </aside><!-- .col -->
                </div><!-- .row -->
            </div><!-- .about-us__main -->
        </div><!-- .container -->
    </section><!-- .about-us -->
    <section class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-md-6 newsletter__content">
                    <img src="{{ asset('home/images/icon_mail.png') }}" alt="Newsletter" class="newsletter__icon">
                    <div class="newsletter__text-content">
                        <h2 class="newsletter__title">@lang('home.Newsletter')</h2>
                        <p class="newsletter__desc">@lang('home.sign_up_newsLetter')</p>
                    </div>
                </div><!-- .col -->

                <div class="col-md-6">
                    <form action="http://haintheme.com/demo/html/realand/index.html" class="newsletter__form">
                        <input type="email" class="newsletter__field" placeholder="@lang('home.email')">
                        <button type="submit" class="newsletter__submit">@lang('home.subscribe')</button>
                    </form>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .newsletter -->

@endsection