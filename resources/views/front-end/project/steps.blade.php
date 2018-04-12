@extends('front_temp.layouts.app')

@section('title')

@endsection

@section('steps', 'active')


@section('content')



    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">

            <li><a href="{{url('/')}}">الرئيسية</a></li>
            <li><a href="{{url('/all-buildings')}}">متابعه مشروع</a></li>
            <li class="active"><a href="{{url('/single-project' . $project_steps->id)}}">{{$project_steps->project_name}}</a></li>
            </ol>
        </div>





 <div class="container">
            <div class="row">
                <!-- Property Detail Content -->
                <div class="col-md-9 col-sm-9">
                    <section id="property-detail">
                        <header class="property-title">
                            <h1>{{$project_steps->project_name}}</h1>
                            <figure class="loc"><figure class="color fa fa-map-marker"></figure> القاهره </figure>
                            <span class="actions">
                                <!--<a href="#" class="fa fa-print"></a>-->
                              <!--  <a href="#" class="bookmark" data-bookmark-state="empty"><span class="title-add">Add to bookmark</span><span class="title-added">Added</span></a>-->
                            </span>
                        </header>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <section id="description">
                                    <header><h2>وصف المشروع</h2></header>
                                    <p>
                         {{ $project_steps->project_small_description }}
                                    </p>
                                    <p>
                          {{ $project_steps->project_large_description }}

                                    </p>
                        </section><!-- /#description -->


<section class="timeline">


                     @foreach($project_steps->levels as $level)
                         <?php $imagel = explode('|', $level->images); ?>


                            <article class="timeline-item">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="circle">
                                            <figure class="dot"></figure>
                                            <div class="date">{{date("d/m/Y",strtotime($level->created_at))}}</div>
                                        </div>
                                    </div><!-- /.col-md-1 -->
                                    <div class="col-md-11">
                                        <div class="wrapper">
                                            <header><h3>{{$level->level_name}}</h3></header>
                                            <a href="{{image_exist($imagel[0])}}" class="image-popup">
                                                <img src="{{image_exist($imagel[0])}}" alt="">
                                            </a>
                                            <p>{{$level->level_large_description}}
                                            </p>
                                             <div class="social">
                                                <a href="#" class="fa fa-twitter btn btn-grey-dark"></a>
                                                <a href="#" class="fa fa-facebook btn btn-grey-dark"></a>
                                                <a href="#" class="fa fa-linkedin btn btn-grey-dark"></a>
                                            </div>
                                        </div>
                                    </div><!-- /.col-md-11 -->
                                </div><!-- /.row -->
                            </article><!-- /.timeline-item --> 
                            @endforeach
              
                        </section>





                               
                                
                                
                            </div><!-- /.col-md-8 -->
                            <div class="col-md-12 col-sm-12">

                     







                                <section id="property-map">
                                    <header><h2>مكان المشروع</h2></header>
                                    <div class="property-detail-map-wrapper">
                                        <div class="property-detail-map" id="property-detail-map">
    <script>
      function initMap() {
        var uluru = {lat:{{ $project_steps->lat}}, lng: {{ $project_steps->lng}}};
        var map = new google.maps.Map(document.getElementById('property-detail-map'), {
          zoom: 13,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      
  }
    </script>           

                                        </div>
                                    </div>
                                </section><!-- /#property-map -->









                        <hr class="thick">
                                <section id="similar-properties">
                                    <header><h2 class="no-border">نماذج المشروع</h2></header>
                                    <div class="row">

                                @foreach($project_steps->buildings as $building)
                                    <?php $image = explode('|', $building->image); ?>

                                        <div class="col-md-4 col-sm-6">
                                            <div class="property">
                                                <a href="{{url('single-building/' . $building->id)}}">
                                                    <div class="property-image">
                                                        <img class="same" alt="" src="{{image_exist($image[0])}}">
                                                    </div>
                                                    <div class="overlay">
                                                        <div class="info">
                                                            <h3>{{$building->building_name}}</h3>
                                                            <figure>القاهره</figure>
                                                        </div>
                                                        <ul class="additional-info">
                                                            <li>
                                                                <header>المساحه:</header>
                                                                <figure>{{$building->building_area}}m<sup>2</sup></figure>
                                                            </li>
                                                   

                                                            <li>
                                                                <header>عدد الغرف:</header>
                                                                <figure>{{$building->rooms}}</figure>
                                                            </li>

                                                            <li>
                                                                <header>حمام:</header>
                                                                <figure>{{$building->baths}}</figure>
                                                            </li>

                          <li>
                            <header>النوع:</header>
                             @if ($building->building_type==0)
                             <figure>شقه</figure>

                            @elseif($building->building_type==1)
                             <figure>فيلا</figure>
                            @elseif($building->building_type==2)
                             <figure>شاليه</figure>
                            @endif 

                                                            </li> 
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div><!-- /.property -->
                                        </div><!-- /.col-md-3 -->
                               @endforeach       
                                    </div><!-- /.row-->
                                </section><!-- /#similar-properties -->
                                <hr class="thick">
                               
                            </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                    </section><!-- /#property-detail -->
                </div><!-- /.col-md-9 -->
                <!-- end Property Detail Content -->

            @include('front-end/building/pages')





@endsection