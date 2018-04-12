@extends('front_temp.layouts.app')
@section('title')
    مرحبا بك زائرنا العزيز
@endsection
@section('home', 'active')

@section('content')

<div id="slider" class="loading has-parallax">
        <div id="loading-icon"><i class="fa fa-cog fa-spin"></i></div>
        <div class="owl-carousel homepage-slider carousel-full-width">
       
        @foreach($projectslider as $projectsl)
         <?php $images = explode('|', $projectsl->images); ?>

        <div class="slide">
                <div class="container">
                    <div class="overlay">
                        <div class="info">
                            <h3>{{ $projectsl->project_name }}</h3>

                            <figure>{!!strip_tags($projectsl->project_small_description)!!}
</figure>
                        </div>
                        <hr>
                        <a href="{{url('single-project/' . $projectsl->id)}}" class="link-arrow">قراءه المزيد</a>
                    </div>
                </div>
                <img alt="" src="/project_images/{{$images[0]}}">
            </div>
          @endforeach
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
                                'class' => 'form-control'
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
                                'class' => 'form-control'
                            ]
                        ) !!}
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">ارسال</button>
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
                      <form action="/search" role="form" id="form-map" method="GET" class="form-map form-search">
                        <div class="row">

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
                     <select name="baths" placeholder="عدد الغرف" class="form-control" style="margin-bottom: 5px">


<option value="">عدد الحمامات</option>

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
    <div id="page-content">
 
        <section id="price-drop" class="block">
            <div class="container">
                <header class="section-title">
                    <h2>أحدث المشروعات</h2>
                    <a href="{{url('/all-projects')}}" class="link-arrow arhome">كل المشروعات</a>
                </header>
                <div class="row">




    @foreach(\App\project::with('buildings')->where('project_status',0)->take('3')->orderBy('id', 'desc')->get() as $project)




                <?php 
                
                $images = explode('|', $project->images); ?>

                    <div class="col-md-4 col-sm-6">
                        <div class="property size">
                            <a href="{{url('single-project/' . $project->id)}}">
                                <div class="property-image">
                                    <img class="bimage lazy" alt="{{$project->project_name}}" data-src="/project_images/{{$images[0]}}">
                                </div>
                                <div class="overlay">
                                    <div class="info">
                                        <h3>{{$project->project_name}}</h3>
                                        <figure>{{$project->project_location}}</figure>
                                    </div>
                                    <ul class="additional-info">
                                        <li>
                                            <header>عدد النمــازج:</header>
                                            <figure>{{$project->buildings->count()}}</figure>
                                        </li>
                
                                    </ul>
                                </div>
                            </a>
                        </div><!-- /.property -->
                    </div><!-- /.col-md-3 -->
    @endforeach

                </div><!-- /.row-->
            </div><!-- /.container -->
        </section><!-- /#price-drop -->

        <section id="new-properties" class="block">
            <div class="container">
                <header class="section-title">
                    <h2>أحدث الوحدات</h2>
                    <a href="{{url('/all-buildings')}}" class="link-arrow arhome">كل الوحدات</a>
                </header>
                <div class="row">
                @foreach(\App\building::take('6')->orderBy('id', 'desc')->get() as $building)
                <?php $image = explode('|', $building->image); ?>


                    <div class="col-md-4 col-sm-6">
                        <div class="property">
                            <a href="{{url('single-building/' . $building->id)}}">
                                <div class="property-image">
                                    <img class="bimage lazy" alt="{{$building->building_name}}" data-src="{{image_exist($image[0])}}">
                                </div>
                                <div class="overlay">
                                    <div class="info">
                                        <div class="tag price">{{$building->building_price}}</div>
                                        <h3>{{$building->building_name}}</h3>
                                        <figure>{{$building->building_location}}</figure>
                                    </div>
                                    <ul class="additional-info">
                                        <li>
                                            <header>المساحه:</header>
                                            <figure>{{$building->building_area}}m<sup>2</sup></figure>
                                        </li>
                                        <li>
                                            <header>الغرف:</header>
                                            <figure>{{$building->rooms}}</figure>
                                        </li>
                                        <li>
                                            <header>حمام:</header>
                                            <figure>{{$building->baths}}</figure>
                                        </li>
                                        <li>
                                            <header>النوع:</header>
                                            <figure>{{$building->building_type}}</figure>
                                        </li>
                                    </ul>
                                </div>
                            </a>
                        </div><!-- /.property -->
                    </div><!-- /.col-md-3 -->
@endforeach

                   
                </div><!-- /.row-->
              
            </div><!-- /.container-->
        </section><!-- /#new-properties-->
 








        <section id="price-drop" class="block">
            <div class="container">
                <header class="section-title">
                    <h2>أحدث الاخبار</h2>
                    <a href="{{url('/all-news')}}" class="link-arrow arhome">كل الاخبار</a>
                </header>
                <div class="row">


    @foreach(\App\news::take('3')->orderBy('id', 'desc')->get() as $new)
                <?php 
                
                $images = explode('|', $new->images); ?>

                    <div class="col-md-4 col-sm-6">
                        <div class="property">
                            <a href="{{url('all-news/' . $new->id)}}">
                                <div class="property-image">
                                    <img class="bimage lazy" alt="{{$new->news_title}}" data-src="/news_images/{{$images[0]}}">
                                </div>
                                    <div class="info">
                                        <h3 class="offertitle">{{$new->news_title}}</h3>
                                    </div>
                            </a>
                        </div><!-- /.property -->
                    </div><!-- /.col-md-3 -->
    @endforeach

                </div><!-- /.row-->
            </div><!-- /.container -->
        </section><!-- /#price-drop -->







        <section id="partners" class="block">
            <div class="container">
                <header class="section-title"><h2>شركائنا</h2></header>
                <div class="logos">
                    <div class="logo"><a href=""><img src="assets/img/logo-partner-01.png" alt=""></a></div>
                    <div class="logo"><a href=""><img src="assets/img/logo-partner-02.png" alt=""></a></div>
                    <div class="logo"><a href=""><img src="assets/img/logo-partner-03.png" alt=""></a></div>
                    <div class="logo"><a href=""><img src="assets/img/logo-partner-04.png" alt=""></a></div>
                    <div class="logo"><a href=""><img src="assets/img/logo-partner-05.png" alt=""></a></div>
                </div>
            </div><!-- /.container -->
        </section><!-- /#partners -->
    </div>














@endsection
