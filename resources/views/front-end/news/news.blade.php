@extends('front_temp.layouts.app')



@section('title')

 اخر الاخبار

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
                <div class="col-md-8">
                    @foreach($news as $new)
                        <?php $image = explode('|', $new->images); ?>
                    <!-- Blog Post -->
                    <div class="blog-post">
                        <!-- Img -->
                        <a href="{{url('اخر-الاخبار/' . $new->id)}}" class="post-img">
                            <img src="{{ asset('news_images/'.$image[0]) }}" alt="">
                        </a>
                        <!-- Content -->
                        <div class="post-content">
                            <h3><a href="{{url('اخر-الاخبار/' . $new->id)}}">{{$new->news_title}}</a></h3>
                            <ul class="post-meta">
                                <li>{{date("d/m/Y",strtotime($new->created_at))}}</li>
                            </ul>
                            <p>{{strip_tags($new->small_description)}}</p>
                            <a href="{{url('اخر-الاخبار/' . $new->id)}}" class="read-more">@lang('home.details') <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <!-- Blog Post / End -->
                    @endforeach

                    <!-- Pagination -->
                    <div class="clearfix"></div>
                    <div class="pagination-container">
                        {{--<nav class="pagination">
                            <ul>
                                <li><a href="#" class="current-page">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                            </ul>
                        </nav>

                        <nav class="pagination-next-prev">
                            <ul>
                                <li><a href="#" class="prev">Previous</a></li>
                                <li><a href="#" class="next">Next</a></li>
                            </ul>
                        </nav>--}}
                        {{ $news->links() }}

                    </div>
                    <div class="clearfix"></div>

                </div>

                <!-- Blog Posts / End -->


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
                       <!--  <div class="widget">
                            <h3>Got any questions?</h3>
                            <div class="info-box margin-bottom-10">
                                <p>If you are having any questions, please feel free to ask.</p>
                                <a href="{{ URL('اتصل-بنا') }}" class="button fullwidth margin-top-20"><i class="fa fa-envelope-o"></i> Drop Us a Line</a>
                            </div>
                        </div>
                        <!-- Widget / End -->


                        <!-- Widget -->
                        <div class="widget">

                            <h3>Popular Posts</h3>
                            <ul class="widget-tabs">

                                <!-- Post #1 -->
                                <li>
                                    <div class="widget-content">
                                        <div class="widget-thumb">
                                            <a href="blog-full-width-single-post.html"><img src="{{ asset('home/images/blog-widget-03.jpg') }}" alt=""></a>
                                        </div>

                                        <div class="widget-text">
                                            <h5><a href="blog-full-width-single-post.html">What to Do a Year Before Buying Apartment </a></h5>
                                            <span>October 26, 2016</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </li>

                                <!-- Post #2 -->
                                <li>
                                    <div class="widget-content">
                                        <div class="widget-thumb">
                                            <a href="blog-full-width-single-post.html"><img src="{{ asset('home/images/blog-widget-02.jpg') }}" alt=""></a>
                                        </div>

                                        <div class="widget-text">
                                            <h5><a href="blog-full-width-single-post.html">Bedroom Colors You'll Never Regret</a></h5>
                                            <span>November 9, 2016</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </li>

                                <!-- Post #3 -->
                                <li>
                                    <div class="widget-content">
                                        <div class="widget-thumb">
                                            <a href="blog-full-width-single-post.html"><img src="{{ asset('home/images/blog-widget-01.jpg') }}" alt=""></a>
                                        </div>

                                        <div class="widget-text">
                                            <h5><a href="blog-full-width-single-post.html">8 Tips to Help You Finding New Home</a></h5>
                                            <span>November 12, 2016</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </li>

                            </ul>

                        </div> 
                        <!-- Widget / End-->


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

