@extends('front_temp.layouts.app')

@section('title')



    عن الشركه



@endsection

@section('about', 'active')

@section('content')



    {!! Html::script('assets/js/jquery-2.1.0.min.js') !!}



<script>



$(document).ready(function() {



$('#tabs li a:not(:first)').addClass('inactive');

$('.containere').hide();

$('.containere:first').show();



$('#tabs li a').click(function(){





     var t = $(this).attr('id');









      if($(this).hasClass('inactive')){ //this is the start of our condition

    $('#tabs li a').addClass('inactive');

    $('#tabs li a').removeClass('color');

    $(this).removeClass('inactive');

    $(this).addClass('color');

    $('.containere').hide();

    $('#'+ t + 'C').fadeIn('slow');

 }



});

});

</script>







<div class="internalheader">

<div class="container">



    <div class="region region-newsletter">

    <section id="block-simplenews-14" class="block block-simplenews clearfix">









</section> <!-- /.block -->

  </div>



</div>

</div>





<div class="container">

         <div class="row">

            <div class="con">



            <!--Start head of content -->



            <!-- Start inside content -->



 <div class="col-md-3">

       <div class="left-side">

        <div class="region region-sidebar-first well">

    <section id="block-menu-menu-about-us-menu" class="block block-menu clearfix">





  <ul id="tabs" class="menu nav">

<li class="leaf"><a style="font-size: 17px" id="tab1" href="#" class="active-trail active color">رسالة رئيس مجلس الإدارة</a></li>

<li class="leaf"><a style="font-size: 17px" id="tab2" href="#">مبادئ الشركة الأساسية</a></li>

<li class="leaf"><a style="font-size: 17px" id="tab3" href="#">مهمتنا ورؤيتنا</a></li>

<li class="leaf"><a style="font-size: 17px" id="tab4" href="#">الوظائف</a></li>

</ul>

</section> <!-- /.block -->

  </div>

                        </div>

                    </div>



<div class="col-md-9">







	<div class="containere" id="tab1C">

    <div class="messages"></div>

    <div class="con-head">

    <h1 class="page-header">رسالة رئيس مجلس الإدارة</h1>

    </div>

<div class="right-side">

    <div class="region region-content">

    <section id="block-system-main" class="block block-system clearfix">

{!!html_entity_decode(getSettings('Boss_Message'))!!}

</section> <!-- /.block -->

</div>

</div>

</div>













	<div class="containere" id="tab2C">

    <div class="messages"></div>

    <div class="con-head">

    <h1 class="page-header">مبادئ الشركة الأساسية</h1>

    </div>

<div class="right-side">

    <div class="region region-content">

    <section id="block-system-main" class="block block-system clearfix">



{!!html_entity_decode(getSettings('purposes'))!!}



</section> <!-- /.block -->

</div>

</div>

</div>







	<div class="containere" id="tab3C">

    <div class="messages"></div>

    <div class="con-head">

    <h1 class="page-header">مهمتنا ورؤيتنا</h1>

    </div>

<div class="right-side">

    <div class="region region-content">

    <section id="block-system-main" class="block block-system clearfix">

{!!html_entity_decode(getSettings('Our_Vision'))!!}

</section> <!-- /.block -->

</div>

</div>

</div>











	<div class="containere" id="tab4C">

    <div class="messages"></div>

    <div class="con-head">

    <h1 class="page-header">الوظائف</h1>

    </div>

<div class="right-side">

    <div class="region region-content">

    <section id="block-system-main" class="block block-system clearfix">

{!!html_entity_decode(getSettings('jobs'))!!}

</section> <!-- /.block -->

</div>

</div>

</div>







</div>

</div>



            <!-- End inside content -->



            </div>

            </div>



















<style>





	.internalheader {

    background: url(/images/Easy-Property-Listings-FB-Cover.png);

    background-size: 100% 100%;

        z-index: 9999;

    height: 258px;

}

.well{

	    margin-top: 30px !important;

}



#tabs li a.inactive{



   color:#797979;

    background: #EEE;





}

.color {

    background-color: #42aae7;

    color: white;

}



.leaf > a:focus {

    background-color: #42aae7 !important;

    color: white !important;

}





</style>











@endsection