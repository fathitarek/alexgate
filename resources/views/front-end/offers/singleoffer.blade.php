@extends('front_temp.layouts.app')



@section('title')

    {{$offer_info->offer_title}}

@endsection


@section('offers', 'active')





@section('content')







    <div id="page-content">

        <!-- Breadcrumb -->

        <div class="container">

            <ol class="breadcrumb">



            <li><a href="{{url('/')}}">الرئيسية</a></li>

            <li><a href="{{url('/العروض')}}">العروض</a></li>

			
			

			
            <li class="active"><a href="{{url('/العروض' . $offer_info->id)}}">{!!html_entity_decode($offer_info->offer_title)!!}</a></li>

            </ol>

        </div>











 <div class="container">

            <div class="row">

                <!-- Property Detail Content -->

                <div class="col-md-12 col-sm-12">

                    <section id="property-detail">

                        <header class="property-title">

                            <h1>{{$offer_info->offer_title}}</h1>

                            <span class="actions">

                                <!--<a href="#" class="fa fa-print"></a>-->

                              <!--  <a href="#" class="bookmark" data-bookmark-state="empty"><span class="title-add">Add to bookmark</span><span class="title-added">Added</span></a>-->

                            </span>

                        </header>

                         <?php $image = explode('|', $offer_info->images); ?>

                        @if(count($image)>1)     

                        <section id="property-gallery">

                            <div class="owl-carousel property-carousel">

            @foreach( explode('|', $offer_info->images) as $image)

                                <div class="property-slide">

                                    <a href="/offers_images/{{ $image }}" class="image-popup">

                                        <div class="overlay"><h3>Front View</h3></div>

                                        <img class="single" alt="" src="/offers_images/{{ $image }}">

                                    </a>

                                </div><!-- /.property-slide -->

            @endforeach   

                               

                            </div><!-- /.property-carousel -->

                        </section>



                        @else

     <div class="property-slide">       

        <a href="/offers_images/{{ $image[0] }}" class="image-popup">

            <img class="single" alt="" src="/offers_images/{{ $image[0] }}">

          </a>   

          </div>  

          <br>

                  @endif               

                        <div class="row">

       

                            <div class="col-md-12 col-sm-12">

                                <section id="description">

                                    <header><h2>وصف العرض</h2></header>

                                    <p class="description">
                                    {!!html_entity_decode($offer_info->offer_description)!!}

                                    </p>


                                </section><!-- /#description -->

                                

                            </div><!-- /.col-md-8 -->


                <!-- end Property Detail Content -->



            <!--include('front-end/building/pages')-->
<!-- do; t7t f el pages -->
        </div><!-- /.row -->
        </div><!-- /.container -->
        </div>
        </div>

<!-- ............... -->






@endsection