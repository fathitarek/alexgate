@extends('front_temp.layouts.app')



@section('title')

    {{$news_info->news_title}}

@endsection


@section('news', 'active')





@section('content')






    <!-- Titlebar
================================================== -->
    <div id="titlebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>@lang('home.blog')</h2>
                    <span>@lang('home.blogdesc')</span>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">@lang('home.home')</a></li>
                            <li>@lang('home.blog')</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>
    <!-- Content
    ================================================== -->
    <div class="container">

        <!-- Blog Posts -->
        <div class="blog-page">
            <div class="row">


                <!-- Post Content -->
                <div class="col-md-8">


                    <!-- Blog Post -->
                    <div class="blog-post single-post">
                    <?php $image = explode('|', $news_info->images); ?>
                        <!-- Img -->
                        <img class="post-img" src="{{ asset('news_images/'.$image[0]) }}" alt="{{$news_info->news_title}}">


                        <!-- Content -->
                        <div class="post-content">
                            <h3>{{$news_info->news_title}}</h3>

                            <ul class="post-meta">
                                <li>Novemer 9, 2016</li>
                            </ul>
                            <div>
                                {!!html_entity_decode($news_info->news_description)!!}
                            </div>
                            <!-- Share Buttons -->
                            <ul class="share-buttons margin-top-40 margin-bottom-0">
                                <li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>
                                <li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
                                <li><a class="gplus-share" href="#"><i class="fa fa-google-plus"></i> Share</a></li>
                                <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li>
                            </ul>
                            <div class="clearfix"></div>

                        </div>
                    </div>
                    <!-- Blog Post / End -->


                    <!-- Post Navigation -->
                    <ul id="posts-nav" class="margin-top-0 margin-bottom-40">
                        @if(count($next))
                            <li class="next-post">
                                <a href="#"><span>Next Post</span>
                                    {{$next->news_title}}</a>
                            </li>
                        @endif
                        @if(count($previous))
                            <li class="prev-post">
                                <a href="#"><span>Previous Post</span>
                                    {{$previous->news_title}}</a>
                            </li>
                        @endif
                    </ul>


                    <!-- About Author -->


                    <!-- Related Posts -->
                    <div class="clearfix"></div>
                    @if(count($relatedNews))
                    <h4 class="headline margin-top-25">Related Posts</h4>
                    <div class="row">
                        @foreach($relatedNews as $news)
                            <?php $image = explode('|', $news->images); ?>
                        <div class="col-md-6">
                            <!-- Blog Post -->
                            <div class="blog-post">
                                <!-- Img -->
                                <a href="{{url('اخر-الاخبار/' . $new->id)}}" class="post-img">
                                    <img src="{{ asset('news_images/'.$image[0]) }}" alt="{{$news->news_title}}">
                                </a>
                                <!-- Content -->
                                <div class="post-content">
                                    <h3><a href="{{url('اخر-الاخبار/' . $new->id)}}">{{$news->news_title}}</a></h3>
                                    <p>{{ strip_tags($news->small_description) }}</p>

                                    <a href="{{url('اخر-الاخبار/' . $new->id)}}" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                            <!-- Blog Post / End -->
                        </div>
                        @endforeach
                    </div>
                    <!-- Related Posts / End -->
                    @endif

                    <div class="margin-top-50"></div>

                    <!-- Reviews -->
          
                    <div class="clearfix"></div>
                    <div class="margin-top-55"></div>


                    <!-- Add Comment -->

                    <!-- Add Comment Form -->
     

                </div>
                <!-- Content / End -->



                <!-- Sidebar
                ================================================== -->

                <!-- Widgets -->
                <div class="col-md-4">
                    <div class="sidebar right">

                        <!-- Widget -->
                        <div class="widget">
                            <h3 class="margin-top-0 margin-bottom-25">@lang('home.search')</h3>
                            <div class="search-blog-input">
                                <div class="input"><input class="search-field" type="text" placeholder="Type and hit enter" value=""></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- Widget / End -->


                        <!-- Widget -->
                        <div class="widget">
                            <h3>Got any questions?</h3>
                            <div class="info-box margin-bottom-10">
                                <p>If you are having any questions, please feel free to ask.</p>
                                <a href="contact.html" class="button fullwidth margin-top-20"><i class="fa fa-envelope-o"></i> Drop Us a Line</a>
                            </div>
                        </div>
                        <!-- Widget / End -->


                        <!-- Widget -->
                        @if(count($relatedNews))
                        <div class="widget">

                            <h3>Popular Posts</h3>
                            <ul class="widget-tabs">
                                @foreach($relatedNews as $news)
                                    <?php $image = explode('|', $news->images); ?>
                                <!-- Post #1 -->
                                <li>
                                    <div class="widget-content">
                                        <div class="widget-thumb">
                                            <a href="{{url('اخر-الاخبار/' . $news->id)}}"><img src="{{ asset('news_images/'.$image[0]) }}" alt="{{$news->news_title}}"></a>
                                        </div>

                                        <div class="widget-text">
                                            <h5><a href="{{url('اخر-الاخبار/' . $news->id)}}">{{$news->news_title}} </a></h5>
                                            <span>{{date("d/m/Y",strtotime($news->created_at))}}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- Widget / End-->
                        @endif


                        <!-- Widget -->
                        <div class="widget">
                            <h3 class="margin-top-0 margin-bottom-25">Social</h3>
                            <ul class="social-icons rounded">
                                <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                                <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                                <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                                <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
                            </ul>

                        </div>
                        <!-- Widget / End-->

                        <div class="clearfix"></div>
                        <div class="margin-bottom-40"></div>
                    </div>
                </div>
            </div>
            <!-- Sidebar / End -->


        </div>
    </div>





















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