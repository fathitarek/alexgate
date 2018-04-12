@extends('front_temp.layouts.app')

@section('title')
    تواصل معنا
@endsection

@section('contact', 'active')

@section('content')

    <section class="contact">
        <div class="container">
            <ul class="ht-breadcrumbs ht-breadcrumbs--y-padding ht-breadcrumbs--b-border">
                <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">@lang('home.home')</span></a></li>
                <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">@lang('home.pages')</span></a></li>
                <li class="ht-breadcrumbs__item"><span class="ht-breadcrumbs__page">@lang('home.contact_us')</span></li>
            </ul><!-- ht-breadcrumb -->

            <div class="contact__main">
                <div class="contact__map-container">
                    <div id="contact-map"></div><!-- .contact__map -->
                </div><!-- .contact__map-container -->

                <div class="row">
                    <div class="col-md-6">
                        <h2 class="contact__title">@lang('home.contact_us')</h2>
                        <div class="contact__desc">
                            <p>@lang('home.msg_contact')</p>
                            <p>@lang('home.from') <strong>@lang('home.monday')</strong>@lang('home.to')<strong>@lang('home.friday')</strong></p>
                        </div>
                        <ul class="agency__contact">
                            <li class="agency__contact-phone"><a href="tel:+3104326507">(310) 432-6507</a></li>
                            <li class="agency__contact-website"><a href="#">www.ReaLand.com</a></li>
                            <li class="agency__contact-email"><a href="mailto:CitiState@domain.com">ReaLand@domain.com</a></li>
                            <li class="agency__contact-address">200 East 65th Street 17NO, New York, NY 10065</li>
                        </ul>
                    </div><!-- .col -->
                    <div class="col-md-6">
                        <h2 class="contact__title">@lang('home.send')</h2>
                        <div class="contact__desc">
                            <p>@lang('home.contact_caption')</p>
                        </div>




                        <form class="contact-form contact-form--no-padding">
                            <div class="contact-form__body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="contact-form__field contact-form__field--contact" placeholder="@lang('home.name')" name="name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="contact-form__field contact-form__field--contact" placeholder="@lang('home.email')" name="email" required>
                                    </div>
                                </div>
                                <input type="tel" class="contact-form__field contact-form__field--contact" placeholder="@lang('home.phone_number')" name="phone number">
                                <textarea class="contact-form__field contact-form__comment contact-form__field--contact" cols="30" rows="4" placeholder="@lang('home.comment')" name="comment" required></textarea>

                            </div><!-- .contact-form__body -->
                            <div class="contact-form__footer">
                                <input type="submit" class="contact-form__submit contact-form__submit--contact" name="submit" value="@lang('home.send_msg')">
                            </div><!-- .contact-form__footer -->
                        </form><!-- .contact-form -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .contact__main -->
        </div>
    </section><!-- .contact -->
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