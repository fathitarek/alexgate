@extends('front_temp.layouts.app')

@section('title')
    تواصل معنا
@endsection

@section('contact', 'active')

@section('content')

<div id="page-content">
    

<div class="container" >

            <ol class="breadcrumb" style="position: relative;">

                <li><a href="/">الرئيسية</a></li>

                <li>اتصل بنا</li>

            </ol>

   </div>

        <div class="container">
            <div class="row">
                <!-- Contact -->
                <div class="col-md-12 col-sm-12">
                    <section id="agent-detail">
                        <header><h1>اتصل بنا</h1></header>
                        <section id="contact-information">
                            <div class="row">
                           




                                <div class="col-md-4 col-sm-5">
                                    <section id="address">
                                        <header><h3>العنوان</h3></header>
                                        <address>
                                            <strong>شركه المؤشر للتطوير العقاري</strong><br>
                                            {{getSettings('address')}}<br>
                                        </address>
                                        {{getSettings('mobile')}}<br>
                                        <a href="#">{{getSettings('googlePlus')}}</a><br>
                                    </section><!-- /#address -->
									<br>
									
                                    <section id="social">
                                        <header><h3>للتواصل</h3></header>
                                        <div class="agent-social">
										@if(getSettings('twitter'))
                                            <a href="http://{{getSettings('twitter')}}" class="fa fa-twitter btn btn-grey-dark"></a>
										@endif
										@if(getSettings('facebook'))
                                            <a href="http://{{getSettings('facebook')}}" class="fa fa-facebook btn btn-grey-dark"></a>
										@endif
										@if(getSettings('linkedIn'))
                                            <a href="http://{{getSettings('linkedIn')}}" class="fa fa-linkedin btn btn-grey-dark"></a>
                                        @endif
										</div>
                                    </section><!-- /#social -->
                                </div><!-- /.col-md-4 -->
                               








                                <div class="col-md-8 col-sm-7">


                        <section id="form">
                            <header><h3>ارسل لنا رساله</h3></header>
                 {{ Form::open(['url' => 'contact', 'method' => 'POST','id'=>'form-contact']) }}

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="form-contact-name">الاسم<em>*</em></label>
                                            <input type="text" class="form-control" id="form-contact-name" name="contact_name" >
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-6 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="form-contact-email">الايميل<em>*</em></label>
                                            <input type="email" class="form-control" id="form-contact-email" name="contact_email" >
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-6 -->

                                   <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="form-contact-name">رقم الهاتف<em>*</em></label>
                                            <input type="text" class="form-control" id="form-contact-phone" name="phone" >
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-6 -->
 
                                <div class="hidden form-group">
                                     <label for="form-contact-agent-phone">اختر نوع الرساله<em>*</em></label>
                                                                  <select id="subject" name="contact_type" class="form-control" >
                                    <option value="1" selected="">اختر نوع الرساله:</option>
                                    @foreach(contacts() as $key => $contact)
                                        <option value="{{$key}}">{{$contact}}</option>
                                    @endforeach
                                </select>
                                </div><!-- /.form-group -->  

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="form-contact-message">الرساله<em>*</em></label>
                                            <textarea class="form-control" id="form-contact-message" rows="8" name="contact_message" ></textarea>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-12 -->
                                </div><!-- /.row -->

                            <div class="phmessage" style="display: none;">من فضلك ادخل البيانات المطلوبه</div>
                            <div class="messlegnth" style="display: none;">الرساله يجب ان لا تقل عن 10 احرف</div>

                                <div class="form-group clearfix">
                                <button type="submit" class="btn pull-right btn-default" id="form-contact-agent-submit">ارسال</button>
                                                        </div><!-- /.
                                </div><!-- /.form-group -->
                                <div id="form-status"></div>
                            </form><!-- /#form-contact -->
                        </section>














     
                        </div><!-- /.col-md-8 -->
                        </div><!-- /.row -->
                        </section><!-- /#agent-info -->
                        <hr class="thick">




<header><h1>اين نحن</h1></header>
                                    <div id="contact-map">
                                        <iframe
  width="100%"
  height="400"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBCYL6Waqywv5uGHm7hJXRxJVP_S8FPC5s&q=شركة+المؤشر%E2%80%AD" allowfullscreen>
</iframe>
                        </div>































                    </section><!-- /#agent-detail -->
                </div><!-- /.col-md-9 -->

<!--<div class="col-md-3 col-sm-3">
                    <section id="sidebar">
                        <aside id="edit-search">
                            <header><h3>بحث متقدم</h3></header>
                            <form role="form" id="form-sidebar" method="GET" class="form-search" action="/search">

                                <div class="form-group">
             {!! Form::select(
                    'rooms',
                    room_numbers(),
                    null,
                    [
                        'placeholder' => 'عدد الغرف',
                        'style' => 'width: 100%'
                    ]
                ) !!}
                                </div>
                                <div class="form-group">
                {!! Form::select(
                    'building_type',
                    building_type(),
                    null,
                    [
                        'placeholder' => 'نوع النموزج',
                        'style' => 'width: 100%'
                    ]
                ) !!}
                                </div>

                                <div class="form-group">
                     {!! Form::text(
                    'building_area',
                    null,
                    [
                        'placeholder' => 'المساحة',
                        'style' => 'width: 100%'
                    ]
                ) !!}
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">ابحث الان</button>
                                </div>
                            </form>
                        </aside>
                        <aside id="our-guides">
                           <a href="{{url('all-projects')}}" class="universal-button {{set_class(['type', '0'])}}">
                                <figure class="fa fa-building-o"></figure>
                                <span>كل المشاريع</span>
                                <span class="arrow fa fa-angle-left"></span>
                            </a>
                            <a href="{{url('all-buildings')}}" class="universal-button {{set_class(['all-buildings'])}}">
                                <figure class="fa fa-home"></figure>
                                <span>كل النماذج</span>
                                <span class="arrow fa fa-angle-left"></span>
                            </a>

      
                            


                        </aside>
                    </section>
                </div> /.col-md-3 -->
                <!-- end Sidebar -->
            </div><!-- /.row -->
</div>
</div>

<br>
<br>

@endsection