<!DOCTYPE html>



<html lang="en-US">

<head>

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ThemeStarz">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	
	
	
@if (trim($__env->yieldContent('desc')))
<meta name="description" content="@yield('desc')">
@else
	<meta name="description" content="{{getSettings('description')}}">


@endif	
	
<meta property="og:type" content="website">
<meta name="og:title" content="{{getSettings()}} | @yield('title')"/>
<meta name="og:description" content="{{getSettings('description')}}"/>
<meta name="og:image" content="{{ asset('assets/img/logo.png') }}"/>

<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{getSettings()}} | @yield('title')">
<meta name="generator" content="{{getSettings()}} @yield('title')" />
<meta name="msapplication-TileImage" content="{{ asset('assets/img/logo.png') }}" />
 <link rel="shortcut icon" href="{{{ asset('images/favicon.ico') }}}">
	
	
	


    <title>

        {{getSettings()}} | @yield('title')

    </title>

  <!-- Styles -->

    {!! Html::style('assets/fonts/font-awesome.css') !!}

    {!! Html::style('assets/bootstrap/css/bootstrap.css') !!}

    {!! Html::style('assets/css/bootstrap-rtl.min.css') !!}

    {!! Html::style('assets/css/bootstrap-select.min.css') !!}

    {!! Html::style('assets/css/magnific-popup.css') !!}

    {!! Html::style('assets/css/jquery.slider.min.css') !!}

    {!! Html::style('assets/css/owl.carousel.css') !!}

    {!! Html::style('assets/css/owl.transitions.css') !!}

    {!! Html::style('assets/css/style.css') !!}

    {!! Html::style('assets/css/bootstrap-rtl.min.css') !!}

    {!! Html::style('assets/css/rtl.css') !!}

    {!! Html::style('admin/dist/css/sweetalert2.min.css') !!}
    {!! Html::script('admin/dist/js/sweetalert2.min.js')!!}

    @yield('header')

	
	
	
	
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109209830-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-109209830-1');
</script>

	
</head>



<style>
.logoo{
    position: absolute;
    margin-bottom: 20px;
    top: 10px;
    left: 15px;
}

.sweet-alert fieldset textarea,.sweet-alert fieldset select ,.sweet-alert fieldset input  {
display: none;
}
.swal2-select{
display: none !important;

}

.phmessage {
    color: red;
    padding: 5px;
}
.breadcrumb > li {
    display:inline !important;
}
</style>



<body class="page-sub-page page-listing-lines page-search-results" id="page-top">

<!-- Wrapper -->

<div class="wrapper">

    <!-- Navigation -->

    <div class="navigation">
        <div class="secondary-navigation">
            <div class="container">
                <div class="contact">
@if(getSettings('mobile'))
                    <figure>رقم التليفون: {{getSettings('mobile')}}</figure>
                    @endif

@if(getSettings('googlePlus'))
                    <figure>{{getSettings('googlePlus')}} :الايميل </figure>
                    @endif

                </div>
				
                <div class="user-area">
                    <div class="actions">
					@if(getSettings('twitter'))
                        <a target="_blank" href="http://{{getSettings('twitter')}}" class="fa fa-twitter"></a>
                    @endif
					
					@if(getSettings('facebook'))
                        <a target="_blank" href="http://{{getSettings('facebook')}}" class="fa fa-facebook"></a>
                    @endif

					@if(getSettings('linkedIn'))
                        <a target="_blank" href="http://{{getSettings('linkedIn')}}" class="fa fa-linkedin"></a>
                    @endif

                    </div>
                </div>
            </div>
        </div>
		
		
		
        <div class="container">

            <header class="navbar" id="top" role="banner">

                <div class="navbar-header">

                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">

                        <span class="sr-only">Toggle navigation</span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                    </button>

                    <div class="navbar-brand nav" id="brand">

                        <a class="logoo" href="/"><img src="{{ asset('assets/img/logo.png') }}" alt="brand"></a>

                    </div>

                </div>

                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">

                    <ul class="nav navbar-nav">

                        <li class="@yield('home')"><a href="{{url('/')}}">الرئيسيه</a>
                        </li>


                        <li class="@yield('offers')"><a href="{{url('/العروض')}}">عروض</a>
                        </li>


                        <li class="@yield('projects')"><a href="{{url('/المشروعات')}}">المشاريع</a>

                        </li>


                        <li class="@yield('samples')"><a href="{{url('/الوحدات')}}">الوحدات</a>
                       </li>   

                        <li class="@yield('prework')"><a href="{{url('/المشروعات-السابقة')}}">سابقه الاعمال</a>
                        </li>

                        <li class="@yield('about')"><a href="{{url('/عن-الشركه')}}">عن الشركه</a>
                        </li>

                        <li class="@yield('news')"><a href="{{url('/اخر-الاخبار')}}">اخر الاخبار</a>
                        </li>
                        <li class="@yield('contact')"><a href="{{url('/تواصل-معنا')}}">اتصل بنا</a></li>





                    </ul>

                </nav><!-- /.navbar collapse-->

            </header><!-- /.navbar -->

        </div><!-- /.container -->

    </div>

@yield('content')













    <footer id="page-footer">

        <div class="inner">

            <aside id="footer-main">

                <div class="containerme">

                    <div class="row">

                        <div class="col-md-4 col-sm-4">

                            <article>

                                <h3>عن الشركه</h3>

                                <p>
                                {{getSettings('description')}}
                                </p>

                                <hr>

                                <a href="{{url('/عن-الشركه')}}" class="link-arrow">اقرأ المزيد</a>

                            </article>

                        </div><!-- /.col-sm-3 -->




                        <div class="col-md-4 col-sm-4">

                          <article>

                                <h3>احدث الوحدات</h3>
                @foreach(\App\Building::with('project')->limit(2)->orderBy('id', 'desc')->where('status', 1)->get() as $building)
                <?php $image = explode('|', $building->image); ?>

                                <div class="property small">
@if($building->nameurl)
    <a href="{{url('الوحدات/'.$building->project->nameurl.'/'.$building->nameurl)}}">
@else
<a href="{{url('الوحدات/'.$building->project->id.'/'.$building->id)}}">
@endif

                                        <div class="{{$building->building_name}}">

                                            <img class="footimg" alt="{{$building->building_name}}" src="{{image_exist($image[0])}}">

                                        </div>

                                    </a>

                                    <div class="info">
@if($building->nameurl)

                                        <a href="{{url('الوحدات/'.$building->project->nameurl.'/'.$building->nameurl)}}"><h4>{{$building->building_name}}</h4></a>
@else
	                                    <a href="{{url('الوحدات/'.$building->project->id.'/'.$building->id)}}"><h4>{{$building->building_name}}</h4></a>

@endif

                                        <figure>{{$building->building_location}} </figure>
                                        <div class="tag price">{{$building->building_price}}</div>
                                    </div>

                                </div><!-- /.property -->
                                @endforeach

                               

                            </article>

                        </div><!-- /.col-sm-3 -->

                        <div class="col-md-4 col-sm-4">

                            <article>

                                <h3>أتصل بنا</h3>

                                <address>

                                    <strong>شركه المؤشر للتطوير العقاري</strong><br>

                        {{getSettings('address')}}<br>

                                    

                                </address>

                               {{getSettings('mobile')}}<br>

                                <a href="#"> {{getSettings('googlePlus')}}</a>

                            </article>

                        </div><!-- /.col-sm-3 -->


                    </div><!-- /.row -->

                </div><!-- /.container -->

            </aside><!-- /#footer-main -->

            <aside id="footer-thumbnails" class="footer-thumbnails"></aside><!-- /#footer-thumbnails -->

            <aside id="footer-copyright">

                <div class="container">

                    <span>Copyright © 2017. All Rights Reserved.</span>

                    <span class="pull-right"><a href="#page-top" class="roll">Go to top</a></span>

                </div>

            </aside>

        </div><!-- /.inner -->

    </footer>







    </div>



<div id="overlay"></div>

    {!! Html::script('assets/js/jquery-2.1.0.min.js') !!}

    {!! Html::script('assets/js/jquery-migrate-1.2.1.min.js') !!}

    {!! Html::script('assets/bootstrap/js/bootstrap.min.js') !!}

    {!! Html::script('assets/js/smoothscroll.js') !!}

    {!! Html::script('assets/js/markerwithlabel_packed.js') !!}

    {!! Html::script('assets/js/infobox.js') !!}

    {!! Html::script('assets/js/owl.carousel.min.js') !!}

    {!! Html::script('assets/js/bootstrap-select.min.js') !!}

    {!! Html::script('assets/js/jquery.validate.min.js') !!}

    {!! Html::script('assets/js/jquery.placeholder.js') !!}

    {!! Html::script('assets/js/icheck.min.js') !!}

    {!! Html::script('assets/js/jquery.vanillabox-0.1.5.min.js') !!}

    {!! Html::script('assets/js/retina-1.1.0.min.js') !!}

    {!! Html::script('assets/js/jquery.raty.min.js') !!}

    {!! Html::script('assets/js/jquery.magnific-popup.min.js') !!}

    {!! Html::script('assets/js/jshashtable-2.1_src.js') !!}

    {!! Html::script('assets/js/jquery.numberformatter-1.2.3.js') !!}

    {!! Html::script('assets/js/tmpl.js') !!}

    {!! Html::script('assets/js/jquery.dependClass-0.1.js') !!}

    {!! Html::script('assets/js/draggable-0.1.js') !!}

    {!! Html::script('assets/js/jquery.slider.js') !!}

    {!! Html::script('assets/js/jquery.fitvids.js') !!}

    {!! Html::script('assets/js/script.js') !!}



    {!! Html::script('assets/js/custom.js') !!}

    {!! Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyB0p1pBCGfZlc4h71HSQ6RDBQaGMlhcDa4&callback=initMap') !!}

   

    {!! Html::script('//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.4/jquery.lazy.min.js') !!}

    {!! Html::script('//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.4/jquery.lazy.plugins.min.js') !!}
  





    @yield('footer')



<!--[if gt IE 8]>

<script type="text/javascript" src="assets/js/ie.js"></script>

<![endif]-->

<script>

    $(window).load(function(){

        initializeOwl(false);

    });

</script>
@include('/admin/layouts/flashMessage')

</body>

</html>
