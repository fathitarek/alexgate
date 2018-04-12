@extends('front_temp.layouts.app')
@section('title')
    كل المشاريع
@endsection

@section('projects', 'active')





@section('content')




               <aside class="col-md-3">
                        <section class="widget main-listing__widget">
                            <form id="form-filter" class="main-listing__form">


                                <div class="main-listing__wrapper">
                                    <label for="listing-city" class="main-listing__form-title">{{ Lang::get('home.location') }}</label>
                                    <select name="location_id" id="listing-city" class="ht-field main-listing__form-field">

                                        <option value="All" selected>{{ Lang::get('home.all').' '.Lang::get('home.locations') }}</option>
                                  
                                    </select><!-- .main-listing__form-field -->
                                </div><!-- .main-listing__wrapper -->

                                <div class="main-listing__wrapper">
                                    <label for="main-listing-keyword" class="main-listing__form-title">{{ Lang::get('home.keyword') }}</label>
                                    <input type="text" @if(!empty($_GET['keyword']))value="{{ $_GET['keyword'] }}"@endif id="main-listing-keyword" name="keyword" class="main-listing__form-field" placeholder="{{ Lang::get('home.enter').Lang::get('home.keyword') }}...">
                                </div><!-- .main-listing__wrapper -->

                                <div class="main-listing__wrapper">
                                    <label for="listing-bedroom" class="main-listing__form-title">{{ Lang::get('home.rooms') }}</label>
                                    <select name="rooms" id="listing-bedroom" class="ht-field main-listing__form-field">
                                        <option value="All" >{{ Lang::get('home.all').' ' .Lang::get('home.rooms') }}</option>
                                        @for($x=1;$x<=6;$x++)
                                            <option @if(isset($_GET['rooms'])&&$_GET['rooms']==$x) selected="selected" @endif value="{{ $x }}">{{ $x }}</option>
                                        @endfor
                                    </select><!-- .main-listing__form-field -->
                                </div><!-- .main-listing__wrapper -->

                                <div class="main-listing__wrapper">
                                    <label for="listing-bathroom" class="main-listing__form-title">{{ Lang::get('home.bathrooms') }}</label>
                                    <select name="baths" id="listing-bathroom" class="ht-field main-listing__form-field">
                                        <option value="All" >{{ Lang::get('home.all') .'  '. Lang::get('home.baths') }}</option>
                                        @for($x=1;$x<=6;$x++)
                                            <option @if(isset($_GET['bathroom'])&&$_GET['bathroom']==$x) selected="selected" @endif value="{{ $x }}">{{ $x }}</option>
                                        @endfor
                                    </select><!-- .main-listing__form-field -->
                                </div><!-- .main-listing__wrapper -->

                                {{--<div class="main-listing__wrapper">
                                    <label for="min-area" class="main-listing__form-title">{{ Lang::get('home.square_feet_fe') }}</label>
                                    <div class="main-listing__form-container">
                                        <select name="min-area" id="min-area" class="ht-field main-listing__form-field">
                                            <option value="0" selected>No min</option>
                                            <option value="100">100</option>
                                            <option value="200">200</option>
                                            <option value="300">300</option>
                                            <option value="400">400</option>
                                        </select><!-- .main-listing__form-field -->

                                        <select name="max-area" id="max-area" class="ht-field main-listing__form-field">
                                            <option value="0" selected>No max</option>
                                            <option value="200">200</option>
                                            <option value="300">300</option>
                                            <option value="400">400</option>
                                            <option value="500">500</option>
                                        </select><!-- .main-listing__form-field -->
                                    </div><!-- .main-listing__form-container -->
                                </div><!-- .main-listing__wrapper -->--}}

                                {{--<div class="main-listing__wrapper">
                                    <label for="min-lot" class="main-listing__form-title">Lot Size</label>
                                    <div class="main-listing__form-container">
                                        <select name="min-lot" id="min-lot" class="ht-field main-listing__form-field">
                                            <option value="0" selected>No min</option>
                                            <option value="1">100</option>
                                            <option value="2">200</option>
                                            <option value="3">300</option>
                                            <option value="4">400</option>
                                        </select><!-- .main-listing__form-field -->

                                        <select name="max-lot" id="max-lot" class="ht-field main-listing__form-field">
                                            <option value="0" selected>No max</option>
                                            <option value="1">200</option>
                                            <option value="2">300</option>
                                            <option value="3">400</option>
                                            <option value="4">500</option>
                                        </select><!-- .main-listing__form-field -->
                                    </div><!-- .main-listing__form-container -->
                                </div><!-- .main-listing__wrapper -->--}}

                                <div class="main-listing__form-expand">
                                    <div class="main-listing__wrapper">
                                        <label for="min-year" class="main-listing__form-title">{{ Lang::get('home.year_built') }}</label>
                                        <div class="main-listing__form-container">
                                            <select name="min_year" id="min-year" class="ht-field main-listing__form-field">
                                                <option value="0" >{{ Lang::get('home.no_min') }}</option>
                                                @for($x=(date('Y')-20);$x<=date('Y');$x++)
                                                    <option @if(isset($_GET['min_year'])&&$_GET['min_year']==$x) selected="selected" @endif value="{{ $x }}">{{ $x }}</option>
                                                @endfor

                                            </select><!-- .main-listing__form-field -->

                                            <select name="max_year" id="max-year" class="ht-field main-listing__form-field">
                                                <option value="0" >{{ Lang::get('home.no_max') }}</option>
                                                @for($x=(date('Y')-20);$x<=date('Y');$x++)
                                                    <option @if(isset($_GET['max_year'])&&$_GET['max_year']==$x) selected="selected" @endif value="{{ $x }}">{{ $x }}</option>
                                                @endfor
                                            </select><!-- .main-listing__form-field -->
                                        </div><!-- .main-listing__form-container -->
                                    </div><!-- .main-listing__wrapper -->
                                </div><!-- .main-listing_-form-expand -->

                            <button  class="main-listing__form-reset clearFilter" type="reset">{{ Lang::get('home.search') }}</button>
                            </form><!-- .main-listing__form -->
                        </section><!-- .widget -->


                    </aside><!-- .col -->





    <main class="col-md-9">

    <section class="main-listing">
        <section class="main-listing__grid">
            <div class="container">
                <div class="row">
                    @foreach($allprojects as $project)
                        <?php $image = explode('|', $project->images); ?>
                        <div class="col-xs-3 item-grid__container">
                            <div class="listing">
                                <div class="item-grid__image-container">
                                    <a href="@if($project->nameurl){{url('المشروعات/' . $project->nameurl)}}@else{{url('المشروعات/' . $project->id)}}@endif">
                                        <div class="item-grid__image-overlay"></div><!-- .item-grid__image-overlay -->
                                        <img src="{{asset('project_images/'.$image[0])}}" alt="{{$project->project_name}}" class="listing__img">
                                        <span class="listing__favorite"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                                    </a>
                                </div><!-- .item-grid__image-container -->

                                <div class="item-grid__content-container">
                                    <div class="listing__content">
                                        <h3 class="listing__title"><a href="@if($project->nameurl){{url('المشروعات/' . $project->nameurl)}}@else{{url('المشروعات/' . $project->id)}}@endif">Real House Luxury Villa</a></h3>
                                        <p class="listing__location"><span class="ion-ios-location-outline listing__location-icon"></span> {{ $project->project_location }}</p>
                                        <div class="listing__details">
                                            <a href="@if($project->nameurl){{url('المشروعات/' . $project->nameurl)}}@else{{url('المشروعات/' . $project->id)}}@endif" class="listing__btn">@lang('home.details') <span class="listing__btn-icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                                        </div><!-- .listing__details -->
                                    </div><!-- .listing-content -->
                                </div><!-- .item-grid__content-container -->
                            </div><!-- .listing -->
                        </div><!-- .col -->
                    @endforeach

                </div><!-- .row -->

                <div class="item-grid--centered">
                    <ul class="pagination">
                       {{-- <li class="pagination__item">
                            <a href="#" class="pagination__link pagination__link_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        </li>
                        <li class="pagination__item">
                        <a href="#" class="pagination__link pagination__link--selected">1</a>
                        </li>
                        <li class="pagination__item">
                        <a href="#" class="pagination__link">2</a>
                        </li>
                        <li class="pagination__item"><a href="#" class="pagination__link">3</a></li>
                        <li class="pagination__item"><a href="#" class="pagination__link pagination__link_next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>--}}
                        {{ $allprojects->links() }}
                    </ul><!-- pagination -->

                </div>
            </div><!-- .container -->
        </section><!-- .item-grid-3 -->
    </section><!-- .main-listing -->
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
                    </main><!-- .col -->

@endsection

