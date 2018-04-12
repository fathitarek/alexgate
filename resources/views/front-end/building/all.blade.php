@extends('front_temp.layouts.app')

@section('title')
    {{ Lang::get('home.all_buildings') }}
@endsection


@section('samples', 'active')

@section('content')



    <section class="main-listing">
        <div class="container">
            <ul class="ht-breadcrumbs ht-breadcrumbs--y-padding">
                <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">@lang('home.home')</span></a></li>
                <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">@lang('home.units')</span></a></li>
            </ul><!-- ht-breadcrumb -->
        </div><!-- .container -->

        <div class="main-listing__main">
            <div class="container">
                <div class="row">
                    <h1 class="section__title section__title--centered section__title--b-margin-40">@lang('home.propertyforsale')</h1>
                    <aside class="col-md-3">
                        <section class="widget main-listing__widget">
                            <form id="form-filter" class="main-listing__form">


                                <div class="main-listing__wrapper">
                                    <label for="listing-city" class="main-listing__form-title">{{ Lang::get('home.location') }}</label>
                                    <select name="location_id" id="listing-city" class="ht-field main-listing__form-field">

                                        <option value="All" selected>{{ Lang::get('home.all').' '.Lang::get('home.locations') }}</option>
                                        @foreach($locations as $location)
                                        <option @if(isset($_GET['location_id'])&&$_GET['location_id']==$location->id) selected="selected" @endif value="{{ $location->id }}">{{ $location->name }}</option>
                                        @endforeach
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
                        <div class="listing-sort listing-sort--main-listing">
                            <div class="listing-sort__inner">
                                <ul class="listing-sort__list">
                                    <li class="listing-sort__item"><a href="#" class="listing-sort__link listing-sort__link--active"><i class="fa fa-th-list" aria-hidden="true" class="listing-sort__icon"></i></a></li>
                                    
                                </ul>

                                <span class="listing-sort__result">{{ $allBuildings->currentPage() }}-{{ $allBuildings->lastPage() }} {{ Lang::get('home.of') }} {{ $allBuildings->total() }} {{ Lang::get('home.results') }}</span>

                                {{--<p class="listing-sort__sort">
                                    <label for="sort-type" class="listing-sort__label"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Sort by </label>
                                    <select name="sort-type" id="sort-type" class="ht-field listing-sort__field">
                                        <option value="default">Default</option>
                                        <option value="low-price">Price (Low to High)</option>
                                        <option value="high-price">Price (High to Low)</option>
                                        <option value="featured">Featured</option>
                                    </select>
                                </p><!-- .listing-sort__sort -->--}}
                            </div><!-- .listing-sort__inner -->
                        </div><!-- .listing-sort -->

                        <div class="main-listing__tags">
                            <span class="main-listing__result">{{ $allBuildings->total() }} {{ Lang::get('home.items_found') }}</span>
                            <ul class="main-listing__list">

                                {!! $tagsHtml !!}
                            </ul><!-- .main-listing__list -->
                            @if(!empty($tagsHtml))
                                <a href="{{ URL('الوحدات') }}" class="main-listing__clear">{{ Lang::get('home.clear_all') }}</a>
                            @endif
                        </div><!-- .main-listing__tags -->

                        <section>
                            @foreach($allBuildings as $building)
                                <?php $image = explode('|', $building->image); ?>
                                <div class="item-grid__container">
                                    <div class="listing listing--v2">
                                        <div class="item-grid__image-container item-grid__image-container--v2">
                                            <a href="@if($building->nameurl){{URL('الوحدات/'.$building->project->nameurl.'/'.$building->nameurl)}}@else{{URL('الوحدات/'.$building->project->nameurl.'/'.$building->id)}}@endif">
                                                <div class="item-grid__image-overlay"></div><!-- .item-grid__image-overlay -->
                                                <img src="{{image_exist($image[0])}}" alt="{{$building->building_name}}" class="listing__img">
                                                <span class="item__label">{{ Lang::get('home.for_sale') }}</span>
                                                <span class="listing__favorite listing__favorite--v2"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                                            </a>
                                        </div><!-- .col -->
    
                                        <div class="item-grid__content-container item-grid__content-container--v2">
                                            <div class="listing__content--v2">
                                                <div class="listing__header">
                                                    <div class="listing__header-primary">
                                                        <span class="listing__type">{{ Lang::get('home.villa') }}</span>
                                                        <h3 class="listing__title"><a href="@if($building->nameurl){{URL('الوحدات/'.$building->project->nameurl.'/'.$building->nameurl)}}@else{{URL('الوحدات/'.$building->project->nameurl.'/'.$building->id)}}@endif">{{$building->project->project_name}}</a></h3>
                                                        <p class="listing__location"><span class="ion-ios-location-outline listing__location-icon"></span> {{$building->project->project_location}}</p>
                                                    </div><!-- .listing__header-primary -->
                                                    <p class="listing__price">${{$building->building_price}}</p>
                                                </div><!-- .listing__header -->
                                                <div class="listing__details">
                                                    <ul class="listing__stats">
                                                        <li><span class="listing__figure">{{ $building->rooms }}</span> {{ Lang::get('home.rooms') }}</li>
                                                        <li><span class="listing__figure">{{ $building->baths }}</span> {{ Lang::get('home.baths') }}</li>
                                                        <li><span class="listing__figure">{{ $building->building_area }}</span> {{ Lang::get('home.sq_ft') }}</li>
                                                    </ul><!-- .listing__stats -->
                                                    <a href="@if($building->nameurl){{URL('الوحدات/'.$building->project->nameurl.'/'.$building->nameurl)}}@else{{URL('الوحدات/'.$building->project->nameurl.'/'.$building->id)}}@endif" class="listing__btn">{{ Lang::get('home.details') }}    <span class="listing__btn-icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                                                </div><!-- .listing__details -->
                                            </div><!-- .listing-content -->
                                        </div><!-- .col -->
                                    </div><!-- .listing -->
                                </div><!-- .item-grid__container -->
                            @endforeach
                        </section>

                        <ul class="pagination pagination--t-margin">
                            {{--<li class="pagination__item">
                                <a href="#" class="pagination__link pagination__link_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                            </li>
                            <li class="pagination__item"><a href="#" class="pagination__link pagination__link--selected">1</a></li>
                            <li class="pagination__item"><a href="#" class="pagination__link">2</a></li>
                            <li class="pagination__item"><a href="#" class="pagination__link">3</a></li>
                            <li class="pagination__item"><a href="#" class="pagination__link pagination__link_next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>--}}
                            {{
                            $allBuildings->links()
                        }}
                        </ul><!-- pagination -->
                    </main><!-- .col -->
                </div><!-- row -->
            </div><!-- .container -->
        </div><!-- .main-listing__main -->
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



@endsection
@section('footerScript')
    <script>
        $(document).on('change','#listing-city,#main-listing-keyword,#listing-bedroom,#listing-bathroom,#min-year,#max-year',function(){
            $("#form-filter").submit();
        })
        $(document).on('click','.clearFilter',function(){
           window.location.href='{{ URL('الوحدات') }}';
        });
        function removeParam(key, sourceURL) {
            var rtn = sourceURL.split("?")[0],
                param,
                params_arr = [],
                queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
            if (queryString !== "") {
                params_arr = queryString.split("&");
                for (var i = params_arr.length - 1; i >= 0; i -= 1) {
                    param = params_arr[i].split("=")[0];
                    if (param === key) {
                        params_arr.splice(i, 1);
                    }
                }
                rtn = rtn + "?" + params_arr.join("&");
            }
            return rtn;
        }
        $(document).on('click','.removeTag',function(){
            tagname=$(this).attr('tagname');
            var c = removeParam(tagname,window.location.href);
            console.log(c);
            window.location.href=c;
        });
        $(document).on('click','#removeMinMaxYear',function(){
            var c = removeParam('min_year',window.location.href);
            c=removeParam('max_year',c);
            console.log(c);
            window.location.href=c;
        });
    </script>
@endsection
