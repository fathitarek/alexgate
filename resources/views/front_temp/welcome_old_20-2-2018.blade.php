@extends('front_temp.layouts.app')
@section('title')
    مرحبا بك زائرنا العزيز
@endsection
@section('home', 'active')

@section('content')
    <style>
        .search-box-wrapper{
            display:none;
        }
    </style>
    <div id="slider"  class="loading has-parallax">
        <div id="loading-icon"><i class="fa fa-cog fa-spin"></i></div>
        <div  class="owl-carousel homepage-slider carousel-full-width">
            @if (!empty($sliders))
                @foreach($sliders as $slider)
                    <div  class="slide">
                        <div  class="container">
                            <div class="overlay">
                                <div class="info">
                                    <h3>{{ $slider->title }}</h3>

                                    <figure>{{ $slider->description }}
                                    </figure>
                                </div>
                                <hr>
                                <a href="{{$slider->url_link}}" class="link-arrow">قراءه المزيد</a>
                            </div>
                        </div>
                        <img alt="" src="{{ asset('sliders/'.$slider->image) }}">
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <!-- end Slider -->

    <!-- Search Box -->

    <div class="search-box-wrapper">
        <div class="search-box-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-md-offset-9 col-sm-4 col-sm-offset-8">
                        <div class="search-box map">
                            <form action="/contacthome" role="form" id="form-map" method="POST" class="form-map form-search">
                                <h2>تواصل معنا</h2>



                            {!! csrf_field() !!}


                            <!-- /.form-group -->
                                <!-- /.form-group -->
                                <!-- /.form-group -->
                                <div class="form-group">
                                    {!! Form::text(
                                           'contact_name',
                                           null,
                                           [
                                               'placeholder' => 'الاسم',
                                               'style' => 'width: 100%',
                                               'class' => 'form-control phname'
                                           ]
                                       ) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::text(
                                           'phone',
                                           null,
                                           [
                                               'placeholder' => 'رقم التليفون',
                                               'style' => 'width: 100%',
                                               'class' => 'form-control phnumber'
                                           ]
                                       ) !!}
                                </div>
                                <div class="phmessage" style="display: none;">من فضلك ادخل البيانات المطلوبه</div>
                                <div class="form-group">
                                    <button  id="sendphone" class="btn btn-default">ارسال</button>
                                </div><!-- /.form-group -->
                            </form><!-- /#form-map -->
                        </div><!-- /.search-box.map -->
                    </div><!-- /.col-md-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.search-box-inner -->
    </div>
    <!-- end Search Box -->


    <div class="block has-dark-background background-color-default-darker center text-banner">

        <div class="search-box-test">
            <div class="search-box-inner">
                <div class="container">
                    <div class="search-box map horz">
                        <form action="{{ URL('search') }}" role="form" id="form-map" method="GET" class="form-map form-search">
                            <div class="row">


                                <div class="col-md-2 col-sm-4">
                                    <div class="form-group">
                                        <select name="project_location" class="form-control" style="margin-bottom: 5px">


                                            <option value="">المنطقه</option>
                                            @foreach($allprojects as $proj)

                                                <option value="{{ $proj->project_location }}">{{ $proj->project_location }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-2 col-sm-4">
                                    <div class="form-group">
                                        <select name="project_id" placeholder="اسم المشروع" class="form-control" style="margin-bottom: 5px">


                                            <option value="">اسم المشروع</option>

                                            @foreach($allprojects as $proj)
                                                <option value="{{ $proj->id }}">{{ $proj->project_name }}</option>
                                            @endforeach
                                        </select>
                                    </div><!-- /.form-group -->
                                </div>


                                <div class="col-md-2 col-sm-4">
                                    <div class="form-group">
                                        {!! Form::select(
                                                      'building_type',
                                                      building_type(),
                                                      null,
                                                      [
                                                          'placeholder' => 'نوع النموزج',
                                                          'style' => 'margin-bottom: 5px',
                                                          'class' => 'form-control'
                                                      ]
                                                  ) !!}
                                    </div><!-- /.form-group -->
                                </div>



                                <div class="col-md-2 col-sm-4">
                                    <div class="form-group">
                                        {!! Form::text(
                                 'building_area',
                                 null,
                                 [
                                     'placeholder' => 'المساحة',
                                     'style' => 'width: 100%',
                                     'class' => 'form-control'
                                 ]
                             ) !!}
                                    </div>
                                </div>


                                <div class="col-md-2 col-sm-4">

                                    <div class="form-group">

                                        <select name="rooms" placeholder="عدد الغرف" class="form-control" style="margin-bottom: 5px">
                                            <option value="">عدد الغرف</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div><!-- /.form-group -->
                                </div>



                                <div class="col-md-2 col-sm-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default">بحث</button>
                                    </div><!-- /.form-group -->
                                </div>
                            </div>
                        </form><!-- /#form-map -->
                    </div><!-- /.search-box -->
                </div><!-- /.container -->
            </div><!-- /.search-box-inner -->
        </div>
        <div class="background-image"><img class="opacity-20" src="assets/img/searchbox-bg.jpg"></div>
    </div>


    <!-- Page Content -->
    <div id="page-content" style="margin-top: 0px">

        <section id="price-drop" class="block">
            <div class="containerme">

                <header class="section-title">
                    <h2>أحدث المشروعات</h2>
                    <a href="{{url('/المشروعات')}}" class="link-arrow arhome">كل المشروعات</a>
                </header>
                <div class="row">



                    @if(count(\App\project::with('Buildings')->where('project_status',0)->take('3')->orderBy('id', 'desc')->get()))
                        @foreach(\App\project::with('Buildings')->where('project_status',0)->take('3')->orderBy('id', 'desc')->get() as $project)




                            <?php

                            $images = explode('|', $project->images); ?>






                            <div class="col-md-4 col-sm-6">
                                <div class="listing-card clearfix">
                                    @if($project->nameurl)
                                        <a href="{{url('المشروعات/' . $project->nameurl)}}" >
                                            @else
                                                <a href="{{url('المشروعات/' . $project->id)}}" >
                                                    @endif
                                                    <div class="img-container">
                                                        <img src="{{ asset('project_images/'.$images[0]) }}" alt="{{$project->project_name}}" width="368">
                                                    </div>
                                                </a>
                                                @if($project->nameurl)
                                                    <h3><a href="{{url('المشروعات/' . $project->nameurl)}}" >{{$project->project_name}}</a></h3>
                                                @else
                                                    <h3><a href="{{url('المشروعات/' . $project->id)}}" >{{$project->project_name}}</a></h3>
                                            @endif
                                            <!--
<div class="descf">
  <span class="detail">المساحه: 255</span>
<span class="detail">المساحه: 255</span>
<span class="detail">المساحه: 255</span>  
<span class="detail">المساحه: 255</span>  
</div>
-->
                                                <p>
                                                    <a class="location_redirect-link" href="#">{{$project->project_location}}</a>
                                                </p>
                                                <div class="clearfix">
                                                    <div class="price-container"><span class="integer">عدد الوحدات: </span>{{$project->buildings->count()}} </div>
                                                    @if($project->nameurl)
                                                        <a href="{{url('المشروعات/' . $project->nameurl)}}"  class="detailsButton">التفاصيل</a>
                                                    @else
                                                        <a href="{{url('المشروعات/' . $project->id)}}"  class="detailsButton">التفاصيل</a>
                                                    @endif


                                                </div>
                                </div>
                            </div>




















                        @endforeach
                    @else
                        <div class="alert alert-danger text-center">لا توجد مشروعات حاليا</div>
                    @endif
                </div><!-- /.row-->
            </div>
        </section><!-- /#price-drop -->









        <section id="new-properties" class="block">
            <div class="containerme">
                <header class="section-title">
                    <h2>أحدث الوحدات</h2>
                    <a href="{{url('/الوحدات')}}" class="link-arrow arhome">كل الوحدات</a>
                </header>
                <div class="row">
                    @if(count(\App\Building::with('project')->take('6')->orderBy('id', 'desc')->get()))
                        @foreach(\App\Building::with('project')->take('6')->orderBy('id', 'desc')->get() as $building)
                            <?php $image = explode('|', $building->image); ?>










                            <div class="col-md-4 col-sm-4">

                                <div class="listing-card clearfix">
                                    @if($building->nameurl)
                                        <a href="{{url('الوحدات/'.$building->project->nameurl.'/'.$building->nameurl)}}" >
                                            @else
                                                <a href="{{url('الوحدات/'.$building->project->nameurl.'/'.$building->id)}}" >
                                                    @endif
                                                    <div class="img-container">
                                                        <img src="{{image_exist($image[0])}}" alt="{{$building->building_name}}" width="368">

                                                    </div>

                                                </a>
                                                @if($building->nameurl)
                                                    <h3><a href="{{url('الوحدات/'.$building->project->nameurl.'/'.$building->nameurl)}}" >{{$building->building_name}}</a></h3>
                                                @else
                                                    <h3><a href="{{url('الوحدات/'.$building->project->nameurl.'/'.$building->id)}}" >{{$building->building_name}}</a></h3>
                                                @endif

                                                <p>
                                                    @if(isset($building->project->project_name))
                                                        @if($building->project->nameurl)
                                                            <a class="location_redirect-link" href="{{url('المشروعات/' . $building->project->nameurl)}}">{{$building->project->project_name}}</a>
                                                        @else
                                                            <a class="location_redirect-link" href="{{url('المشروعات/' . $building->project->id)}}">{{$building->project->project_name}}</a>
                                                        @endif
                                                    @endif
                                                </p>
                                                <div class="clearfix">
                                                    <div class="price-container">{{$building->building_price}} جنيه</div>
                                                    @if($building->nameurl)
                                                        <a href="{{url('الوحدات/'.$building->project->nameurl.'/'.$building->nameurl)}}"  class="detailsButton">التفاصيل</a>
                                                    @else
                                                        <a href="{{url('الوحدات/'.$building->project->nameurl.'/'.$building->id)}}"  class="detailsButton">التفاصيل</a>
                                                    @endif
                                                </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-danger text-center">لا توجد وحدات حاليا</div>
                    @endif

                </div><!-- /.row-->

            </div><!-- /.container-->
        </section><!-- /#new-properties-->








        <section id="price-drop" class="block">
            <div class="containerme">
                <header class="section-title">
                    <h2>أحدث الاخبار</h2>
                    <a href="{{url('/اخر-الاخبار')}}" class="link-arrow arhome">كل الاخبار</a>
                </header>
                <div class="row">

                    @if(count(\App\news::take('3')->orderBy('id', 'desc')->get()))
                        @foreach(\App\news::take('3')->orderBy('id', 'desc')->get() as $new)
                            <?php

                            $images = explode('|', $new->images); ?>










                            <div class="col-md-4 col-sm-4">

                                <div class="listing-card clearfix">

                                    <a href="{{url('all-news/' . $new->id)}}" >

                                        <div class="img-container">
                                            <img src="{{image_exist($images[0])}}" alt="{{$building->building_name}}" width="368">

                                        </div>

                                    </a>

                                    <h3><a href="{{url('all-news/' . $new->id)}}" >{{$new->news_title}}</a></h3>

                                    <p>
                                        <?php
                                        $string = strip_tags($new->news_description);
                                        if (strlen($string) > 500) {
                                            // truncate string
                                            $stringCut = substr($string, 0, 500);
                                            // make sure it ends in a word so assassinate doesn't become ass...
                                            $string = substr($stringCut, 0, strrpos($stringCut, ' '));
                                        }

                                        ?>
                                        <a class="location_redirect-link" href="{{url('all-news/' . $new->id)}}">{{$string}}</a>
                                    </p>
                                    <div class="clearfix">
                                        <a href="{{url('all-news/' . $new->id)}}"  class="detailsButton">التفاصيل</a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-danger text-center">لا توجد اخبار حاليا</div>
                    @endif
                </div><!-- /.row-->
            </div><!-- /.container -->
        </section><!-- /#price-drop -->



        <section id="partners" >
            <div class="containerme">
                <header class="section-title"><h2>شركائنا</h2></header>
                <div class="logos">
                    @foreach($clients as $client)
                        <div class="logo"><a href=""><img class="logopartner" style="width:100px; height: 100px;" src="{{ asset('clients/'.$client->image) }}" alt=""></a></div>
                    @endforeach

                </div>
            </div><!-- /.container -->
        </section><!-- /#partners -->
    </div>

@endsection
