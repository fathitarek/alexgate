@extends('front_temp.layouts.app')



@section('title')

 اخر الاخبار

@endsection



@section('news', 'active')





@section('content')



    <div id="page-content">

        <!-- Breadcrumb -->

        <div class="container">

            <ol class="breadcrumb">

                <li><a href="{{url('/')}}">الرئيسية</a></li>

                <li>أخر الاخبار</li>

            </ol>

   </div>




<div class="container">

            <div class="row">

                <!-- Results -->

                <div class="col-md-12 col-sm-12">


                        <header><h1>قائمه الاخبار</h1></header>








@if(count($news) > 0)


        @foreach($news as $new)

        <?php $image = explode('|', $new->images); ?>



              <div class="col-md-9 col-sm-9">
                    <section id="content">
                        <article class="blog-post">
                            <a href="{{url('اخر-الاخبار/' . $new->id)}}"><img src="/news_images/{{$image[0]}}"></a>
                            <header><a href="{{url('اخر-الاخبار/' . $new->id)}}"><h2>{{$new->news_title}}</h2></a></header>
                            <figure class="meta">
                                <a href="#" class="link-icon"><i class="fa fa-user"></i>ادمن</a>
                                <a href="#" class="link-icon"><i class="fa fa-calendar"></i>{{date("d/m/Y",strtotime($new->created_at))}}</a>

                            </figure>
                            <p>{{$new->small_description}}
                            </p>
                            <a href="{{url('اخر-الاخبار/' . $new->id)}}" class="link-arrow">إقرأ المزيد</a>
                        </article><!-- /.blog-post -->
                    </section><!-- /#content -->
                </div><!-- /.col-md-9 -->
        @endforeach





@else

    <div class="alert alert-danger text-center">لا توجد اخبار حاليا</div>

@endif


                     <div class="text-center">

                        {{

                            $news->links()

                        }}

                    </div>



                </div><!-- /.col-md-9 -->


                <!-- end Sidebar -->

            </div><!-- /.row -->

        </div><!-- /.container -->

    </div>


@endsection

