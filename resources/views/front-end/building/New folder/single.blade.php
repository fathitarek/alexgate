@extends('front_temp.layouts.app')

@section('title')
    {{$building_info->building_name}}
@endsection
@if($building_info->project->project_name==1)
@section('prework', 'active')
@else
@section('samples', 'active')

@endif

@section('content')



    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">

            <li><a href="{{url('/')}}">الرئيسية</a></li>
            <li><a href="{{url('/all-buildings')}}">النماذج</a></li>
            <li class="active"><a href="{{url('/single-building' . $building_info->id)}}">{{$building_info->building_name}}</a></li>
            </ol>
        </div>





 <div class="container">
            <div class="row">
                <!-- Property Detail Content -->
                <div class="col-md-12 col-sm-12">
                    <section id="property-detail">
                        <header class="property-title">
                            <h1>{{$building_info->building_name}} - <a class="proj" href="{{url('single-project/' . $building_info->project->id)}}"> {{$building_info->project->project_name}}</a></h1>
                            <figure class="loc"><figure class="color fa fa-map-marker"></figure> القاهره </figure>
                            <span class="actions">
                                <!--<a href="#" class="fa fa-print"></a>-->
                              <!--  <a href="#" class="bookmark" data-bookmark-state="empty"><span class="title-add">Add to bookmark</span><span class="title-added">Added</span></a>-->
                            </span>
                        </header>
                            <?php $image = explode('|', $building_info->image); ?>
            @if(count($image)>1)                        
            <section id="property-gallery">
                            <div class="owl-carousel property-carousel">

            @foreach( explode('|', $building_info->image) as $image)
                                <div class="property-slide">
                                    <a href="/building_images/{{ $image }}" class="image-popup">
                                        <div class="overlay"><h3>Front View</h3></div>
                                        <img class="single" alt="" src="/building_images/{{ $image }}">
                                    </a>
                                </div><!-- /.property-slide -->

            @endforeach
       
     

 
                               
                            </div><!-- /.property-carousel -->
                        </section>

            @else
         <div class="property-slide">       
        <a href="/building_images/{{ $image[0] }}" class="image-popup">
            <img class="single" alt="" src="/building_images/{{ $image[0] }}">
          </a>   
          </div>  
          <br>
                  @endif     
                   <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <section id="quick-summary" class="clearfix">
                                    <header><h2>التفاصيل</h2></header>
                                    <dl>
                                        <dt>المكان: </dt>
                                            <dd>القاهره</dd>
                                     <dt>عدد الوحدات: </dt>
                                            <dd>60 وحده</dd>

                                        <dt>السعر: </dt>
                                            <dd><span class="tag price">{{$building_info->building_price}}</span></dd>
            

                                    <dt>الحاله: </dt>

                                    <dd>تحت الانشاء</dd>
                        

                                        <dt>المساحه:</dt>
                                            <dd>{{ $building_info->building_area }} m<sup>2</sup></dd>
                                        <dt>عدد الغرف:</dt>
                                            <dd>{{ $building_info->rooms }}</dd>
                                        <dt>عدد الحمامات: </dt>
                                            <dd>{{ $building_info->baths }}</dd>
                                        <dt>جراج:</dt>
                                            <dd>{{ $building_info->project->garage }}</dd>
                  
                                    </dl>
                                </section><!-- /#quick-summary -->
                            </div><!-- /.col-md-4 -->
                            <div class="col-md-8 col-sm-12">
                                <section id="description">
                                    <header><h2>وصف المشروع</h2></header>
                                    <p class="description">

{!!html_entity_decode($building_info->project->project_small_description)!!}


                                                    </p>
                                    <p class="description">

                  {!!html_entity_decode($building_info->project->project_large_description)!!}
                  

                                    </p>
                                </section><!-- /#description -->


                             <section id="paymethods">
                                @if($building_info->project->pay_methods!='')
                                    <header><h2>طرق الدفع</h2></header>
                                    <p class="description">
                                   {{$building_info->project->pay_methods}}                 
                                                    </p>
                                 @endif                   
                                </section><!-- /#description -->



                              @if($building_info->project->project_features != '')      
                                <section id="property-features">
                                    <header><h2>مميزات المشروع</h2></header>
                                    <ul class="list-unstyled property-features-list">
                                    @foreach( explode('|', $building_info->project->project_features) as $feature)
     
                              <li>{{$feature}}</li>
                    @endforeach
               
                                    </ul>
                                </section><!-- /#property-features -->
                            @endif  
                                
                                 <section id="property-map">
                                    <header><h2>مكان المشروع</h2></header>
                                    <div class="property-detail-map-wrapper">
                                        <div class="property-detail-map" id="property-detail-map">
           


    <script>
      function initMap() {
        var uluru = {lat:{{ $building_info->project->lat}}, lng: {{ $building_info->project->lng}}};
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
                            </div><!-- /.col-md-8 -->
                            <div class="col-md-12 col-sm-12">
                                <section id="contact-agent">
                                    <header><h2>تواصل معنا</h2></header>
                                    <div class="row">
                                        <section class="agent-form">
                                            <div class="col-md-7 col-sm-12">
                                                <aside class="agent-info clearfix">
                                                    
                                                    <div class="agent-contact-info">
                                                        <h3>المؤشر للتطوير العقاري</h3>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et dui vestibulum,
                                                            bibendum purus sit amet, vulputate mauris. Ut adipiscing gravida tincidunt.
                                                            Duis euismod placerat rhoncus.
                                                        </p>
                                                        <dl>
                                                            <dt>Phone:</dt>
                                                            <dd>01234567891</dd>
                                                            <dt>Mobile:</dt>
                                                            <dd>01234567891</dd>
                                                            <dt>Email:</dt>
                                                            <dd><a href="mailto:#">john.doe@example.com</a></dd>
                                                            <dt>Skype:</dt>
                                                            <dd>john.doe</dd>
                                                        </dl>
                                                        <hr>
                                                        <a href="agent-detail.html" class="link-arrow">Full Profile</a>
                                                    </div>
                                                </aside><!-- /.agent-info -->
                                            </div><!-- /.col-md-7 -->
                                            <div class="col-md-5 col-sm-12">
                                                <div class="agent-form">
                                                                {{ Form::open(['url' => 'contact', 'method' => 'POST']) }}
                                                        <div class="form-group">
                                                            <label for="form-contact-agent-name">الاسم<em>*</em></label>
                                                            <input type="text" class="form-control" id="form-contact-agent-name" name="contact_name" required>
                                                        </div><!-- /.form-group -->
                                                        <div class="form-group">
                                                            <label for="form-contact-agent-email">الايميل<em>*</em></label>
                                                            <input type="email" class="form-control" id="form-contact-agent-email" name="contact_email" required>
                                                        </div><!-- /.form-group -->
                                                       <div class="form-group">
                                                            <label for="form-contact-agent-phone">رقم التليفون<em>*</em></label>
                                                            <input type="text" class="form-control" id="form-contact-agent-name" name="phone" required>
                                                        </div><!-- /.form-group -->
                                                        <div class="form-group hidden">
                                                            <label for="form-contact-agent-phone">اختر نوع الرساله<em>*</em></label>
                                                                  <select id="subject" name="contact_type" class="form-control" required="required">
                                    <option value="1" selected="">اختر نوع الرساله:</option>
                                    @foreach(contacts() as $key => $contact)
                                        <option value="{{$key}}">{{$contact}}</option>
                                    @endforeach
                                </select>
                                                        </div><!-- /.form-group -->      
                                                        <div class="form-group">
                                                            <label for="form-contact-agent-message">الرساله<em>*</em></label>
                                                            <textarea class="form-control" id="form-contact-agent-message" rows="2" name="contact_message" required></textarea>
                                                        </div><!-- /.form-group -->
                                                        <div class="form-group">
                                                            <button type="submit" class="btn pull-right btn-default" id="form-contact-agent-submit">ارسال</button>
                                                        </div><!-- /.form-group -->
                                                        <div id="form-contact-agent-status"></div>
                                                    </form><!-- /#form-contact -->
                                                </div><!-- /.agent-form -->
                                            </div><!-- /.col-md-5 -->
                                        </section><!-- /.agent-form -->
                                    </div><!-- /.row -->
                                </section><!-- /#contact-agent -->
                              <hr class="thick">
                                <section id="similar-properties">
                                  @if(count(\App\building::where('project_id', $building_info->project_id)->get()))
                                    <header><h2 class="no-border"> نمازج اخري للمشروع
                                    </h2></header>
@endif
                                    <div class="row">

                                @foreach(\App\building::where('project_id', $building_info->project_id)->get() as $buildingsam)
                                <?php $imagesam = explode('|', $buildingsam->image); ?>
                                @if($buildingsam->id==$building_info->id)
                                @else
                                        <div class="col-md-4 col-sm-6">
                                            <div class="property">
                                                <a href="{{url('single-building/' . $buildingsam->id)}}">
                                                    <div class="property-image">
                                                        <img class="same" alt="" src="{{image_exist($imagesam[0])}}">
                                                    </div>
                                                    <div class="overlay">
                                                        <div class="info">
                                                            <div class="tag price">{{$buildingsam->building_price}}</div>
                                                            <h3>{{$buildingsam->building_name}}</h3>
                                                            <figure>القاهره</figure>
                                                        </div>
                                                        <ul class="additional-info">
                                                            <li>
                                                                <header>المساحه:</header>
                                                                <figure>{{$buildingsam->building_area}}m<sup>2</sup></figure>
                                                            </li>
                                                            <li>
                                                                <header>عدد الغرف:</header>
                                                                <figure>{{$buildingsam->rooms}}</figure>
                                                            </li>
                                                            <li>
                                                                <header>الحمامات:</header>
                                                                <figure>{{$buildingsam->baths}}</figure>
                                                            </li>
                                          <li>
                            <header>النوع:</header>
                             @if ($buildingsam->building_type==0)
                             <figure>شقه</figure>

                            @elseif($buildingsam->building_type==1)
                             <figure>فيلا</figure>
                            @elseif($buildingsam->building_type==2)
                             <figure>شاليه</figure>
                            @endif 
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div><!-- /.property -->
                                        </div><!-- /.col-md-3 -->
                                        @endif
                        @endforeach
                                    </div><!-- /.row-->
                                </section><!-- /#similar-properties -->
                                <hr class="thick">
                               
                            </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                    </section><!-- /#property-detail -->
                </div><!-- /.col-md-9 -->
                <!-- end Property Detail Content -->

            <!--include('front-end/building/pages')-->
<!-- do; t7t f el pages -->
        </div><!-- /.row -->
        </div><!-- /.container -->
        </div>

<!-- ............... -->




@endsection