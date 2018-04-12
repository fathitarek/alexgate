@extends('front_temp.layouts.app')
@section('title')
    {{ Lang::get('home.welcome_to_our_dear_visitor') }}
@endsection
@section('home', 'active')

@section('content')
    @if(getSettings('slider_type')=='slider')
        @include('front_temp.slider_normal');
    @else
        @include('front_temp.slider_building')
    @endif

    <section class="item-grid">
        <div class="container">
            @foreach($newBuildings as $building)
                <?php $images = explode('|', $building->image); ?>
                <div class="item-grid__container">
                    <div class="listing listing--v2">
                        <div class="item-grid__image-container item-grid__image-list">
                            <a href="@if($building->nameurl){{url('الوحدات/' . $building->project->nameurl.'/'.$building->nameurl)}}@else{{url('الوحدات/' . $building->project->nameurl.'/'.$building->id)}}@endif">
                                <div class="item-grid__image-overlay"></div><!-- .item-grid__image-overlay -->
                                <img src="{{ asset(image_exist($images[0])) }}" alt="{{$building->project_name}}" class="listing__img">
                                <span class="item__label">{{ lang::get('home.for_sale') }}</span>
                                <span class="listing__favorite listing__favorite--v2"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                            </a>
                        </div><!-- .col -->

                        <div class="item-grid__content-container item-grid__content-list">
                            <div class="listing__content--v2">
                                <div class="listing__header">
                                    <div class="listing__header-primary">
                                        <h3 class="listing__title">
                                            <a href="@if($building->nameurl){{url('الوحدات/' . $building->project->nameurl.'/'.$building->nameurl)}}@else{{url('الوحدات/' . $building->project->nameurl.'/'.$building->id)}}@endif">{{$building->project->project_name}}</a>
                                        </h3>

                                        <p class="listing__location">
                                            <span class="ion-ios-location-outline listing__location-icon"></span>
                                            {{$building->project->project_location}}
                                        </p>
                                    </div><!-- .listing__header-primary -->
                                    <a href="@if($building->nameurl){{url('الوحدات/' . $building->project->nameurl.'/'.$building->nameurl)}}@else{{url('الوحدات/' . $building->project->nameurl.'/'.$building->id)}}@endif" class="listing__btn">
                                        {{ Lang::get('home.details') }}
                                        <span class="listing__btn-icon">
                                            @if(Session::get('locale')=='en')    
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            @else
                                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                                            @endif
                                        </span>
                                    </a>
                                </div><!-- .listing__header -->
                                <p class="listing__price">${{$building->building_price}}</p>

                                <div class="listing__details listing__details--v2">
                                    <ul class="listing__stats">
                                        <li><span class="listing__figure">{{ $building->rooms }}</span> {{ Lang::get('home.rooms') }}</li>
                                        <li><span class="listing__figure">{{ $building->baths }}</span> {{ Lang::get('home.baths') }}</li>
                                        <li><span class="listing__figure">{{ $building->building_area }}</span> {{ Lang::get('home.sq_ft') }}</li>
                                    </ul><!-- .listing__stats -->
                                </div><!-- .listing__details -->
                                <p class="listing__desc">
                                   {{ strip_tags($building->building_small_description) }}
                                </p>
                            </div><!-- .listing-content -->
                        </div><!-- .col -->
                    </div><!-- .listing -->
                </div><!-- .item-grid__container -->
            @endforeach
            <div class="item-grid--centered">
                <a href="{{ URL('الوحدات') }}" class="item-grid__load-more">{{ Lang::get('home.load_more') }}</a>
            </div>
        </div><!-- .container -->
    </section><!-- .item-grid-1 -->




    <!-- Fullwidth Section -->
    <section class="fullwidth margin-top-105" data-background-color="#f7f7f7" style="background: rgb(247, 247, 247);">

        <!-- Box Headline -->
        <h3 class="headline-box">{{ Lang::get('home.what_are_you_looking_for') }}</h3>

        <!-- Content -->
        <div class="container">
            <div class="row">
                @foreach(\App\HomeFetcher1::all() as $item)
                <div class="col-md-3 col-sm-6">
                    <!-- Icon Box -->
                    <div class="icon-box-1">
                        <div class="icon-container">
                            <i class="{{ $item->icon }}"></i>
                            <div class="icon-links">
                                <a href="{{ $item->icon_link }}">{{ $item->icon_hover }}</a>
                            </div>
                        </div>
                        <h3>{{ $item->title }}</h3>
                        <p>{{ $item->description }}</p>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- Fullwidth Section / End -->





    <?php $section2=\App\HomeFetcher2::find(1)?>
    @if(count($section2))
    <!--Welcome Haven section-->
    <div class="welcome-haven bg-1">
        <div class="container">
            <div class="row">

                {!! $section2->html !!}
            </div>
        </div>
    </div>
    <!--Welcome Haven section end-->
    @endif





    <section class="new-listing">
        <div class="container">
            <div class="new-listing__header">
                <h2 class="section__title section__title--b-margin">{{ Lang::get('home.new_listing_by_region') }}</h2>
                <a href="#" class="new-listing__all">{{ Lang::get('home.view_all_region') }}
                    <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </div>

            <div class="new-listing__wrapper">
                @foreach(\App\Locations::take(9)->orderBy('building_count','DESC')->get() as $location)
                <div class="new-listing__single">
                    <a href="{{ URL('الوحدات?location_id='.$location->id) }}">
                        <div class="new-listing__bg " style="background-image:url('{{asset($location->img_dir.$location->img)}}');"></div><!-- .new-listing__bg -->

                        <div class="new-listing__content">
                            <h3 class="new-listing__title">{{ $location->name }}</h3>

                            <p class="new-listing__desc">{{ $location->building_count }} {{ Lang::get('home.building') }}</p>
                        </div><!-- .new-listing__content -->
                    </a>
                </div><!-- .new-listing__single -->
                @endforeach
            </div><!-- .new-listing__wrapper -->
        </div><!-- .container -->
    </section><!-- .new-listing -->

    <section class="popular-links">
        <div class="popular-links__container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="popular-links__single">
                            <h4 class="popular-links__header">Popuplar Real Estate</h4>
                            <ul class="popular-links__list">
                                <li><a href="#">Arizona Real Estate</a></li>
                                <li><a href="#">Florida Real Estate</a></li>
                                <li><a href="#">Michigan Real Estate</a></li>
                                <li><a href="#">Georgia Real Estate</a></li>
                                <a href="#" id="js-expand">More <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            </ul>
                        </div><!-- .popular-link__single -->
                    </div><!-- .col -->
                    <div class="col-sm-6 col-md-3">
                        <div class="popular-links__single">
                            <h4 class="popular-links__header">Popuplar Apartment Cities</h4>
                            <ul class="popular-links__list">
                                <li><a href="#">Denver Apartments</a></li>
                                <li><a href="#">Miami Apartments</a></li>
                                <li><a href="#">Miami Beach Apartments</a></li>
                                <li><a href="#">Porland OR Apartments</a></li>
                                <a href="#" id="js-expand">More <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            </ul>
                        </div><!-- .popular-link__single -->
                    </div><!-- .col -->
                    <div class="col-sm-6 col-md-3">
                        <div class="popular-links__single">
                            <h4 class="popular-links__header">Popuplar Resources</h4>
                            <ul class="popular-links__list">
                                <li><a href="#">Local Real Estate Market</a></li>
                                <li><a href="#">Android Rentals App</a></li>
                                <li><a href="#">Iphone Rentals App</a></li>
                                <li><a href="#">Financial Calculators</a></li>
                                <a href="#" id="js-expand">More <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            </ul>
                        </div><!-- .popular-link__single -->
                    </div><!-- .col -->
                    <div class="col-sm-6 col-md-3">
                        <div class="popular-links__single">
                            <h4 class="popular-links__header">US Property Records</h4>
                            <ul class="popular-links__list">
                                <li><a href="#">Alabama Property Records</a></li>
                                <li><a href="#">Alaska Property Records</a></li>
                                <li><a href="#">Arizona Property Records</a></li>
                                <li><a href="#">Arkansas Property Records</a></li>
                                <a href="#" id="js-expand">More <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            </ul>
                        </div><!-- .popular-link__single -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .popular-links__container -->
    </section><!-- .popular-links -->
    <section class="partners">
        <div class="container">
            <ul class="partners__list">
                @foreach(App\clients::get() as $client)
                    <li><img src="{{ asset('clients/'.$client->image) }}" alt="Partner"></li>
                @endforeach
                {{--<li><img src="{{ asset('home/images/uploads/partner1.jpg') }}" alt="Partner"></li>
                <li><img src="{{ asset('home/images/uploads/partner2.jpg') }}" alt="Partner"></li>
                <li><img src="{{ asset('home/images/uploads/partner3.jpg') }}" alt="Partner"></li>
                <li><img src="{{ asset('home/images/uploads/partner4.jpg') }}" alt="Partner"></li>
                <li><img src="{{ asset('home/images/uploads/partner5.jpg') }}" alt="Partner"></li>--}}
            </ul><!-- .partners__list -->
        </div><!-- .container -->
    </section><!-- .partners -->
@endsection
