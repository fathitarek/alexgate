@extends('front_temp.layouts.app')

@section('title')
    {{$building_info->building_name}}
@endsection

@section('desc')
{!!html_entity_decode($building_info->building_small_description)!!}
@endsection

@section('content')

    <section class="property">
        <div class="container">
            <ul class="ht-breadcrumbs ht-breadcrumbs--y-padding ht-breadcrumbs--b-border">
                <li class="ht-breadcrumbs__item"><a href="{{ URL('/') }}" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">@lang('home.home')</span></a></li>
                <li class="ht-breadcrumbs__item"><a href="{{ URL('الوحدات') }}" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">@lang('home.units')</span></a></li>
                <li class="ht-breadcrumbs__item"><span class="ht-breadcrumbs__page">{{$building_info->building_name}}</span></li>
            </ul><!-- ht-breadcrumb -->
        </div><!-- .container -->

        <div class="property__header">
            <div class="container">
                <div class="property__header-container">
                    <ul class="property__main">
                        <li class="property__title property__main-item">
                            <div class="property__meta">
                                <span class="property__offer">@lang('home.for_sale')</span>
                                <span class="property__type">@lang('home.luxury_house')</span>
                            </div><!-- .property__meta -->
                            <h2 class="property__name">{{$building_info->building_name}}</h2>
                            <span class="property__address"><i class="ion-ios-location-outline property__address-icon"></i>{{$building_info->project->project_location}}</span>
                        </li>
                        <li class="property__details property__main-item">
                            <ul class="property__stats">
                                <li class="property__stat"><span class="property__figure">{{ $building_info->rooms }}</span> @lang('home.rooms')</li>
                                <li class="property__stat"><span class="property__figure">{{ $building_info->baths }}</span> @lang('home.baths')</li>
                                <li class="property__stat"><span class="property__figure">{{ $building_info->building_area }}</span> @lang('home.sq_ft')</li>
                            </ul><!-- .listing__stats -->
                        </li>
                        <li class="property__price property__main-item">
                            <h4 class="property__price-primary">${{$building_info->building_price}}</h4>
                            <span class="property__price-secondary">$4,824/@lang('home.sq_ft')</span>
                        </li>
                    </ul><!-- .property__main -->


                </div><!-- .property__header-container -->
            </div><!-- .container -->
        </div><!-- .property__header -->

        <div class="property__slider">
            <div class="container">
                <div class="property__slider-container property__slider-container--vertical">
                    <ul class="property__slider-nav property__slider-nav--vertical">
                        @foreach( explode('|', $building_info->image) as $image)
                            <li class="property__slider-item">
                                <img src="{{ asset('building_images/'.$image) }}" alt="Image 1">
                            </li>
                        @endforeach
                    </ul><!-- .property__slider-nav -->

                    <div class="property__slider-main property__slider-main--vertical">
                        <div class="property__slider-images">
                            @foreach( explode('|', $building_info->image) as $image)
                                <div class="property__slider-image">
                                    <img src="{{ asset('building_images/'.$image) }}" alt="Image 1">
                                </div><!-- .property__slider-image -->
                            @endforeach
                        </div><!-- .property__slider-images -->

                        <ul class="image-navigation">
                            <li class="image-navigation__prev">
                                <span class="ion-ios-arrow-left"></span>
                            </li>
                            <li class="image-navigation__next">
                                <span class="ion-ios-arrow-right"></span>
                            </li>
                        </ul>

                        <span class="property__slider-info"><i class="ion-android-camera"></i><span class="sliderInfo"></span></span>
                    </div><!-- .property__slider-main -->
                </div><!-- .property__slider-container -->
            </div><!-- .container -->
        </div><!-- .property__slider -->

        <div class="property__container">
            <div class="container">
                <div class="row">
                    <aside class="col-md-3">
                        <div class="widget__container">
                            <section class="widget">
<form method="POST" action="http://localhost:8000/contactuss" accept-charset="UTF-8">                
    <div class="contact-form__header">
                  <div class="contact-form__header-container">
                    <div class="contact-info">
                      <h3 class="contact-name"><a href="#">@lang('home.booknow')</a></h3>
                      <a href="tel:+8002883991" class="contact-number">@lang('home.call'): (800) 288 3991</a>
                    </div><!-- .contact-info -->
                  </div><!-- .contact-form__header-container -->
                </div><!-- .contact-form__header -->
                
                <div class="contact-form__body">
                  <input type="text" class="contact-form__field" placeholder="@lang('home.name')" name="name" required="">
                  <input type="email" class="contact-form__field" placeholder="@lang('home.email')" name="email" required="">
                  <input type="tel" class="contact-form__field" placeholder="@lang('home.phone_number')" name="phone number">
                  <textarea class="contact-form__field contact-form__comment" cols="30" rows="5" placeholder="@lang('home.comment')" name="comment" required=""></textarea>
                </div><!-- .contact-form__body -->

                <div class="contact-form__footer">
                  <input type="submit" class="contact-form__submit" name="submit" value="@lang('home.send_msg')">
                </div><!-- .contact-form__footer -->
              </form><!-- .contact-form -->


                                <div class="contact-form contact-form--white">
                                    <div class="contact-form__footer">
                                        <input type="submit" class="contact-form__submit" name="submit" value="@lang('home.contact_us')" onclick="$(this).val('19999').attr('disabled','disabled')" >
                                    </div><!-- .contact-form__footer -->
                                </div><!-- .contact-form -->
                            </section><!-- .widget -->

                            <section class="widget widget--white widget--padding-20">
                                <h3 class="widget__title">@lang('home.similar_homes')</h3>
                                @foreach(\App\building::with('project')->where('project_id', $building_info->project_id)->take(3)->get() as $buildingsam)
                                    <?php $images = explode('|', $buildingsam->image); ?>
                                    <div class="similar-home">
                                        <a href="@if($buildingsam->nameurl){{url('الوحدات/' . $buildingsam->nameurl)}}@else{{url('الوحدات/' . $buildingsam->id)}}@endif">
                                            <div class="similar-home__image">
                                                <div class="similar-home__overlay"></div><!-- .similar-home__overlay -->
                                                <img src="{{ asset(image_exist($images[0])) }}" alt="{{$buildingsam->project_name}}">
                                                <span class="similar-home__favorite"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                                            </div><!-- .similar-home__image -->
                                            <div class="similar-home__content">
                                                <h3 class="similar-home__title">{{$buildingsam->project_name}}</h3>
                                                <span class="similar-home__price">${{$buildingsam->building_price}}</span>
                                            </div><!-- .similar-home__content -->
                                        </a>
                                    </div><!-- .similar-home -->
                                @endforeach
                            </section><!-- .widget -->

                            <section class="widget widget--white widget--padding-20">
                                <h3 class="widget__title">Mortgage Calculator</h3>
                                <form class="form-calculator">
                                    <div class="form-calculator__group">
                                        <label for="home-price" class="form-calculator__label">Home Price</label>
                                        <span class="form-calculator__icon form-calculator__currency">$</span>
                                        <input id="home-price" type="text" class="form-calculator__field" required value="2,568,000">
                                    </div><!-- .form-calculator__group -->

                                    <div class="form-calculator__wrapper">
                                        <div class="form-calculator__group form-calculator__group--larger">
                                            <label for="down-payment" class="form-calculator__label">Down Payment</label>
                                            <span class="form-calculator__icon form-calculator__currency">$</span>
                                            <input id="down-payment" type="text" class="form-calculator__field" required value="317,600">
                                        </div><!-- .form-calculator__group -->

                                        <div class="form-calculator__group form-calculator__group--smaller">
                                            <label for="percent" class="form-calculator__label">Percent</label>
                                            <span class="form-calculator__icon form-calculator__percent">%</span>
                                            <input id="percent" type="text" class="form-calculator__field" required value="20">
                                        </div><!-- .form-calculator__group -->
                                    </div><!-- .form-calculator__wrapper -->

                                    <div class="form-calculator__group">
                                        <label for="annual-rate" class="form-calculator__label">Annual Interest Rate</label>
                                        <span class="form-calculator__icon form-calculator__percent">%</span>
                                        <input id="annual-rate" type="text" class="form-calculator__field" required value="3.5">
                                    </div><!-- .form-calculator__group -->

                                    <div class="form-calculator__group">
                                        <label for="loan-term" class="form-calculator__label">Loan Term (Years)</label>
                                        <select id="loan-term" class="ht-field" required>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10" selected>10</option>
                                        </select>
                                    </div><!-- .form-calculator__group -->
                                    <div class="form-calculator__group">
                                        <label for="percent" class="form-calculator__label">Payment Method</label>
                                        <select id="percent" class="ht-field" required>
                                            <option value="Weekly">WEEKLY</option>
                                            <option value="Monthly" selected>MONTHLY</option>
                                            <option value="Bi-Weekly">BI-WEEKLY</option>
                                        </select>
                                    </div><!-- .form-calculator__group -->

                                    <input type="submit" class="form-calculator__submit" value="Calculate">

                                    <div class="form-calculator__result">
                                        <h3 class="mortgage-payment">Mortgage Payments: <span>$22253.28</span></h3>
                                    </div>
                                </form><!-- .form-calculator -->
                            </section><!-- .widget -->


                        </div><!-- .widget__container -->
                    </aside>

                    <main class="col-md-9">
                        <div class="property__feature-container">
                  

                            <div class="property__feature">
                                <h3 class="property__feature-title property__feature-title--b-spacing">@lang('home.property_description')</h3>
                                <div>{!! $building_info->building_large_description !!}</div>
                            </div><!-- .property__feature -->

                            <div class="property__feature">
                                <h3 class="property__feature-title property__feature-title--b-spacing">@lang('home.property_details')</h3>
                                <ul class="property__details-list">
                                    <li class="property__details-item"><span class="property__details-item--cat">Type:</span> Flat, Low-Rise (1-3)</li>
                                    <li class="property__details-item"><span class="property__details-item--cat">Year Built:</span> 1890</li>
                                    <li class="property__details-item"><span class="property__details-item--cat">Square Footage:</span> 1752</li>
                                    <li class="property__details-item"><span class="property__details-item--cat">Property Subtype:</span> Condominium</li>
                                    <li class="property__details-item"><span class="property__details-item--cat">Property Type:</span> Condo/Coop/TIC/Loft</li>
                                    <li class="property__details-item"><span class="property__details-item--cat">HOA Dues:</span> 375 HOA</li>
                                    <li class="property__details-item"><span class="property__details-item--cat">Fee Includes:</span> Water, Electricity, Garbage, Ext Bldg Maintainance, Security Service, Homeowners Insurance</li>
                                    <li class="property__details-item"><span class="property__details-item--cat">HOA:</span> Yes</li>
                                </ul><!-- .property__details-list -->
                            </div><!-- .property__feature -->

                            <div class="property__feature">
                                <h3 class="property__feature-title property__feature-title--b-spacing">@lang('home.property_features')</h3>
                                <ul class="property__features-list">
                                    @foreach( explode('|', $building_info->project->project_features) as $feature)
                                        <li class="property__features-item"><span class="property__features-icon ion-checkmark-round"></span>{{$feature}}</li>
                                    @endforeach
                                </ul><!-- .property__features-list -->
                            </div><!-- .property__feature -->

                            <div class="property__feature">
                                <h3 class="property__feature-title property__feature-title--b-spacing">@lang('home.floor_plans') (2)</h3>
                                <div class="property__accordion">
                                    <div class="property__accordion-header">
                                        <div class="property__accordion-textcontent">
                                            <span class="property__accordion-title">First Floor</span>
                                            <ul class="property__accordion-stats">
                                                <li class="property__accordion-figure"><span class="property__accordion-figure--cat">@lang('home.size'):</span> 2650</li>
                                                <li class="property__accordion-figure"><span class="property__accordion-figure--cat">@lang('home.rooms'):</span> 1670 @lang('home.sq_ft')</li>
                                                <li class="property__accordion-figure"><span class="property__accordion-figure--cat"> @lang('home.baths'):</span> 980 @lang('home.sq_ft')</li>
                                                <li class="property__accordion-figure"><span class="property__accordion-figure--cat">@lang('home.prices'):</span> $568</li>
                                            </ul><!-- .property__accordion-stats -->
                                        </div><!-- .property__accordion-textcontent -->
                                        <i class="fa fa-caret-up property__accordion-expand" aria-hidden="true"></i>
                                    </div><!-- .property__accordion-header -->

                                    <div class="property__accordion-content property__accordion-content--active">
                                        <img src="{{ asset('home/images/uploads/floor_plan.png') }}" alt="Floor Plan">
                                    </div><!-- .property__accordion-content -->
                                </div><!-- .property__accordion -->
                                <div class="property__accordion">
                                    <div class="property__accordion-header">
                                        <div class="property__accordion-textcontent">
                                            <span class="property__accordion-title">Second Floor</span>
                                            <ul class="property__accordion-stats">
                                                <li class="property__accordion-figure"><span class="property__accordion-figure--cat">@lang('home.size'):</span> 2650</li>
                                                <li class="property__accordion-figure"><span class="property__accordion-figure--cat">@lang('home.rooms'):</span> 1670 @lang('home.sq_ft')</li>
                                                <li class="property__accordion-figure"><span class="property__accordion-figure--cat">@lang('home.baths'):</span> 980 @lang('home.sq_ft')</li>
                                                <li class="property__accordion-figure"><span class="property__accordion-figure--cat">@lang('home.prices'):</span> $568</li>
                                            </ul><!-- .property__accordion-stats -->
                                        </div><!-- .property__accordion-textcontent -->
                                        <i class="fa fa-caret-down property__accordion-expand" aria-hidden="true"></i>
                                    </div><!-- .property__accordion-header -->

                                    <div class="property__accordion-content">
                                        <img src="{{ asset('home/images/uploads/floor_plan.png') }}" alt="Floor Plan">
                                    </div><!-- .property__accordion-content -->
                                </div><!-- .property__accordion -->
                            </div><!-- .property__feature -->

                            <div class="property__feature">
                                <div class="property__feature-header">
                                    <h3 class="property__feature-title">@lang('home.near_by')</h3>
                                    <nav class="property__tab-list">
                                        <a href="#property-school" class="property__tab property__tab--active">School (3)</a>
                                        <a href="#property-market" class="property__tab">Market (2)</a>
                                        <a href="#property-restaurant" class="property__tab">Restaurant (5)</a>
                                        <a href="#property-cafe" class="property__tab">Cafe (1)</a>
                                        <a href="#property-hospital" class="property__tab">Hospital (1)</a>
                                    </nav>
                                </div><!-- .property__feature-header -->
                                <div class="property__tab-container">
                                    <table class="property__tab-content is-visible" id="property-school">
                                        <thead>
                                        <tr>
                                            <th> @lang('home.name')</th>
                                            <th>@lang('home.distance')</th>
                                            <th>@lang('home.type')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><span class="list-number">1</span> GuangZhu Chinese Education Center</td>
                                            <td>1.5km</td>
                                            <td>Language Center</td>
                                        </tr>
                                        <tr>
                                            <td><span class="list-number">2</span> Galileo High School</td>
                                            <td>3km</td>
                                            <td>High School</td>
                                        </tr>
                                        <tr>
                                            <td><span class="list-number">3</span> Daniel Webster Elementary School</td>
                                            <td>5km</td>
                                            <td>High School</td>
                                        </tr>
                                        </tbody>
                                    </table><!-- .property__tab-content -->
                                </div><!-- .property__tab-container -->

                                <div class="property__tab-container">
                                    <table class="property__tab-content" id="property-market">
                                        <thead>
                                        <tr>
                                            <th> @lang('home.name')</th>
                                            <th>@lang('home.distance')</th>
                                            <th>@lang('home.type')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><span class="list-number">1</span> Roche Bros.</td>
                                            <td>2km</td>
                                            <td>Grocery</td>
                                        </tr>
                                        <td><span class="list-number">2</span> Mings Supermarket</td>
                                        <td>5km</td>
                                        <td>Grocery</td>
                                        </tbody>
                                    </table><!-- .property__tab-content -->
                                </div><!-- .property__tab-container -->

                                <div class="property__tab-container">
                                    <table class="property__tab-content" id="property-restaurant">
                                        <thead>
                                        <tr>
                                            <th> @lang('home.name')</th>
                                            <th>@lang('home.distance')</th>
                                            <th>@lang('home.type')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><span class="list-number">1</span> Ostra</td>
                                            <td>4km</td>
                                            <td>Seafood</td>
                                        </tr>
                                        <tr>
                                            <td><span class="list-number">2</span> Mistral</td>
                                            <td>2.5km</td>
                                            <td>French</td>
                                        </tr>
                                        <tr>
                                            <td><span class="list-number">3</span> The Capital Grille</td>
                                            <td>3km</td>
                                            <td>American</td>
                                        </tr>
                                        <tr>
                                            <td><span class="list-number">4</span> Davio's</td>
                                            <td>6km</td>
                                            <td>Italian</td>
                                        </tr>
                                        <tr>
                                            <td><span class="list-number">5</span> Sorellina</td>
                                            <td>5km</td>
                                            <td>Italian</td>
                                        </tr>
                                        </tbody>
                                    </table><!-- .property__tab-content -->
                                </div><!-- .property__tab-container -->

                                <div class="property__tab-container">
                                    <table class="property__tab-content" id="property-cafe">
                                        <thead>
                                        <tr>
                                             <th> @lang('home.name')</th>
                                            <th>@lang('home.distance')</th>
                                            <th>@lang('home.type')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><span class="list-number">1</span> Thinking Cup</td>
                                            <td>2km</td>
                                            <td>Fast Service</td>
                                        </tr>
                                        </tbody>
                                    </table><!-- .property__tab-content -->
                                </div><!-- .property__tab-container -->

                                <div class="property__tab-container">
                                    <table class="property__tab-content" id="property-hospital">
                                        <thead>
                                        <tr>
                                             <th> @lang('home.name')</th>
                                            <th>@lang('home.distance')</th>
                                            <th>@lang('home.type')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><span class="list-number">1</span> Mass General Hospital Back Bay</td>
                                            <td>3km</td>
                                            <td>Medical Clinic</td>
                                        </tr>
                                        </tbody>
                                    </table><!-- .property__tab-content -->
                                </div><!-- .property__tab-container -->
                            </div><!-- .property__feature -->

                        </div><!-- .property__feature-container -->
                    </main>
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .property__container -->
    </section><!-- .property -->
    <section class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-md-6 newsletter__content">
                    <img src="images/icon_mail.png" alt="Newsletter" class="newsletter__icon">
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