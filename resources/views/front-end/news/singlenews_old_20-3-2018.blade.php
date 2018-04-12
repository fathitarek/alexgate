@extends('front_temp.layouts.app')



@section('title')

    {{$news_info->news_title}}

@endsection


@section('news', 'active')





@section('content')







    <div id="page-content">

        <!-- Breadcrumb -->

        <div class="container">

            <ol class="breadcrumb">



            <li><a href="{{url('/')}}">الرئيسية</a></li>

            <li><a href="{{url('/اخر-الاخبار')}}">أخر الاخبار</a></li>

            <li class="active"><a href="{{url('/single-news' . $news_info->id)}}">{{$news_info->news_title}}</a></li>

            </ol>

        </div>











 <div class="container">

            <div class="row">

                <!-- Property Detail Content -->
     <div class="col-md-9 col-sm-9">
                    <section id="content">
                        <article class="blog-post">
                        <?php $image = explode('|', $news_info->images); ?>

                            <a href="blog-detail.html"><img src="/news_images/{{$image[0]}}"></a>
                            <header><a href="#"><h2>{{$news_info->news_title}}</h2></a></header>
                            <figure class="meta">
                                <a href="#" class="link-icon"><i class="fa fa-user"></i>ادمن</a>
                                <a href="#" class="link-icon"><i class="fa fa-calendar"></i>{{date("d/m/Y",strtotime($news_info->created_at))}}</a>
                            </figure>
                            

                            <p>
							{!!html_entity_decode($news_info->small_description)!!}

                            </p>
                 
     <h3>تفاصيل الخبر</h3>
                            <p>
							{!!html_entity_decode($news_info->news_description)!!}


                            </p>
   
      
                        </article><!-- /.blog-post-listing -->
    
                    </section><!-- /#content -->
            

                </div><!-- /.col-md-9 -->





     
        </div>
        </div>

<!-- ............... -->






@endsection