@extends('front_temp.layouts.app')



@section('title')
{{$project_info->project_name}}
@endsection
@section('desc')
{!!html_entity_decode($project_info->project_small_description)!!}
@endsection
@section('content')


<div class="property__header">
    <div class="container">
      <div class="property__header-container">
        <ul class="property__main">
          <li class="property__title property__main-item">
     
            <h2 class="property__name">{{$project_info->project_name}}</h2>
            <span class="property__address"><i class="ion-ios-location-outline property__address-icon"></i>{{$project_info->project_location}}</span>
          </li>
 

        </ul><!-- .property__main -->
      </div><!-- .property__header-container -->
    </div><!-- .container -->
  </div><!-- .property__header -->

  <div class="property__container">
    <div class="container">
      <div class="row">
        <main class="col-md-9">
          <div class="property__feature-container">
            <div class="property__slider property__slider--v2">
                <div class="property__slider-container">
                  
                  <div class="property__slider-main">
                    <div class="property__slider-images">
           





                      @foreach( explode('|', $project_info->images) as $image)
@if( $image!='')
                      <div class="property__slider-image">
                        <img src="/project_images/{{ $image }}" alt="imagename">
                      </div><!-- .property__slider-image -->
@endif
            @endforeach  


                    </div><!-- .property__slider-images -->
          
                    <ul class="image-navigation">
                      <li class="image-navigation__prev">
                        <span class="ion-ios-arrow-left"></span>
                      </li>
                      <li class="image-navigation__next">
                        <span class="ion-ios-arrow-right"></span>
                      </li>
                    </ul>
          
                    <span class="property__slider-info"><i class="ion-android-camera"></i><span class="sliderInfo"></span></span>
                  </div><!-- .property__slider-main -->

                  <ul class="property__slider-nav property__slider-nav--horizontal">
                @foreach( explode('|', $project_info->images) as $image)
                @if( $image!='')

                    <li class="property__slider-item">
                      <img src="/project_images/{{ $image }}" alt="Image 1">
                    </li><!-- .property__slider-item -->
          @endif
            @endforeach  
                  </ul><!-- .property__slider-nav -->
                </div><!-- .property__slider-container -->
              </div><!-- .property__slider -->


            <div class="property__feature">
              <h3 class="property__feature-title property__feature-title--b-spacing">@lang('home.projectdesc')</h3>
              <p> 
{{$project_info->project_location}}
              </p>
            </div><!-- .property__feature -->

            <div class="property__feature">
              <h3 class="property__feature-title property__feature-title--b-spacing">Property Details</h3>
              <ul class="property__details-list">
                <li class="property__details-item"><span class="property__details-item--cat">Type:</span> Flat, Low-Rise (1-3)</li>
                <li class="property__details-item"><span class="property__details-item--cat">Year Built:</span> 1890</li>
                <li class="property__details-item"><span class="property__details-item--cat">Square Footage:</span> 1752</li>
                <li class="property__details-item"><span class="property__details-item--cat">Property Subtype:</span> Condominium</li>
                <li class="property__details-item"><span class="property__details-item--cat">Property Type:</span> Condo/Coop/TIC/Loft</li>
                <li class="property__details-item"><span class="property__details-item--cat">HOA Dues:</span> 375 HOA</li>
                <li class="property__details-item"><span class="property__details-item--cat">Fee Includes:</span> Water, Electricity, Garbage, Ext Bldg Maintainance, Security Service, Homeowners Insurance</li>
                <li class="property__details-item"><span class="property__details-item--cat">HOA:</span> Yes</li>
              </ul><!-- .property__details-list -->
            </div><!-- .property__feature -->

            <div class="property__feature">
              <h3 class="property__feature-title property__feature-title--b-spacing">@lang('home.projectfeat')</h3>
              <ul class="property__features-list">

                                    @foreach( explode('|', $project_info->project_features) as $feature)

                     <li class="property__features-item"><span class="property__features-icon ion-checkmark-round"></span>{{$feature}}</li>



                    @endforeach

              </ul><!-- .property__features-list -->
            </div><!-- .property__feature -->




            <div class="property__feature">
              <h3 class="property__feature-title property__feature-title--b-spacing">@lang('home.projectpayment')</h3>


                                @if($project_info->pay_methods!='')

                                    <p>
                                {!!html_entity_decode($project_info->pay_methods)!!}
</p>
@endif

              
            </div><!-- .property__feature -->





            <div class="property__feature">
              <h3 class="property__feature-title property__feature-title--b-spacing"@lang('home.projectlocation')</h3>


                  <div class="property-detail-map" id="property-detail-map" style="width:100%">





    <script>

      function initMap() {

        var uluru = {lat:{{ $project_info->lat}}, lng: {{ $project_info->lng}}};

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

              
            </div><!-- .property__feature -->









            <div class="property__feature">
              <h3 class="property__feature-title property__feature-title--b-spacing">Floor Plans (2)</h3>
              <div class="property__accordion">
                <div class="property__accordion-header">
                  <div class="property__accordion-textcontent">
                    <span class="property__accordion-title">First Floor</span>
                    <ul class="property__accordion-stats">
                      <li class="property__accordion-figure"><span class="property__accordion-figure--cat">Size:</span> 2650</li>
                      <li class="property__accordion-figure"><span class="property__accordion-figure--cat">Rooms:</span> 1670 Sqft</li>
                      <li class="property__accordion-figure"><span class="property__accordion-figure--cat">Baths:</span> 980 Sqft</li>
                      <li class="property__accordion-figure"><span class="property__accordion-figure--cat">Prices:</span> $568</li>
                    </ul><!-- .property__accordion-stats -->
                  </div><!-- .property__accordion-textcontent -->
                  <i class="fa fa-caret-up property__accordion-expand" aria-hidden="true"></i> 
                </div><!-- .property__accordion-header -->

                <div class="property__accordion-content property__accordion-content--active">
                  <img src="images/uploads/floor_plan.png" alt="Floor Plan">
                </div><!-- .property__accordion-content -->
              </div><!-- .property__accordion -->
              <div class="property__accordion">
                <div class="property__accordion-header">
                  <div class="property__accordion-textcontent">
                    <span class="property__accordion-title">Second Floor</span>
                    <ul class="property__accordion-stats">
                      <li class="property__accordion-figure"><span class="property__accordion-figure--cat">Size:</span> 2650</li>
                      <li class="property__accordion-figure"><span class="property__accordion-figure--cat">Rooms:</span> 1670 Sqft</li>
                      <li class="property__accordion-figure"><span class="property__accordion-figure--cat">Baths:</span> 980 Sqft</li>
                      <li class="property__accordion-figure"><span class="property__accordion-figure--cat">Prices:</span> $568</li>
                    </ul><!-- .property__accordion-stats -->
                  </div><!-- .property__accordion-textcontent -->
                  <i class="fa fa-caret-down property__accordion-expand" aria-hidden="true"></i>
                </div><!-- .property__accordion-header -->

                <div class="property__accordion-content">
                  <img src="images/uploads/floor_plan.png" alt="Floor Plan">
                </div><!-- .property__accordion-content -->
              </div><!-- .property__accordion -->
            </div><!-- .property__feature -->

            <div class="property__feature">
              <div class="property__feature-header">
                <h3 class="property__feature-title">Near By</h3>
                <nav class="property__tab-list">
                  <a href="#property-school" class="property__tab property__tab--active">School (3)</a>
                  <a href="#property-market" class="property__tab">Market (2)</a>
                  <a href="#property-restaurant" class="property__tab">Restaurant (5)</a>
                  <a href="#property-cafe" class="property__tab">Cafe (1)</a>
                  <a href="#property-hospital" class="property__tab">Hospital (1)</a>
                </nav>
              </div><!-- .property__feature-header -->
              <div class="property__tab-container">
                <table class="property__tab-content is-visible" id="property-school">
                  <thead>
                    <tr>
                      <th>List number / Name</th>
                      <th>Distance</th>
                      <th>Type</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><span class="list-number">1</span> GuangZhu Chinese Education Center</td>
                      <td>1.5km</td>
                      <td>Language Center</td>
                    </tr>
                    <tr>
                      <td><span class="list-number">2</span> Galileo High School</td>
                      <td>3km</td>
                      <td>High School</td>
                    </tr>
                    <tr>
                      <td><span class="list-number">3</span> Daniel Webster Elementary School</td>
                      <td>5km</td>
                      <td>High School</td>
                    </tr>
                  </tbody>
                </table><!-- .property__tab-content -->
              </div><!-- .property__tab-container -->

              <div class="property__tab-container">
                <table class="property__tab-content" id="property-market">
                  <thead>
                    <tr>
                      <th>List number / Name</th>
                      <th>Distance</th>
                      <th>Type</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><span class="list-number">1</span> Roche Bros.</td>
                      <td>2km</td>
                      <td>Grocery</td>
                    </tr>
                    <td><span class="list-number">2</span> Mings Supermarket</td>
                    <td>5km</td>
                    <td>Grocery</td>
                  </tbody>
                </table><!-- .property__tab-content -->
              </div><!-- .property__tab-container -->

              <div class="property__tab-container">
                <table class="property__tab-content" id="property-restaurant">
                  <thead>
                    <tr>
                      <th>List number / Name</th>
                      <th>Distance</th>
                      <th>Type</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><span class="list-number">1</span> Ostra</td>
                      <td>4km</td>
                      <td>Seafood</td>
                    </tr>
                    <tr>
                      <td><span class="list-number">2</span> Mistral</td>
                      <td>2.5km</td>
                      <td>French</td>
                    </tr>
                    <tr>
                      <td><span class="list-number">3</span> The Capital Grille</td>
                      <td>3km</td>
                      <td>American</td>
                    </tr>
                    <tr>
                      <td><span class="list-number">4</span> Davio's</td>
                      <td>6km</td>
                      <td>Italian</td>
                    </tr>
                    <tr>
                      <td><span class="list-number">5</span> Sorellina</td>
                      <td>5km</td>
                      <td>Italian</td>
                    </tr>
                  </tbody>
                </table><!-- .property__tab-content -->
              </div><!-- .property__tab-container -->

              <div class="property__tab-container">
                <table class="property__tab-content" id="property-cafe">
                  <thead>
                    <tr>
                      <th>List number / Name</th>
                      <th>Distance</th>
                      <th>Type</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><span class="list-number">1</span> Thinking Cup</td>
                      <td>2km</td>
                      <td>Fast Service</td>
                    </tr>
                  </tbody>
                </table><!-- .property__tab-content -->
              </div><!-- .property__tab-container -->

              <div class="property__tab-container">
                <table class="property__tab-content" id="property-hospital">
                  <thead>
                    <tr>
                      <th>List number / Name</th>
                      <th>Distance</th>
                      <th>Type</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><span class="list-number">1</span> Mass General Hospital Back Bay</td>
                      <td>3km</td>
                      <td>Medical Clinic</td>
                    </tr>
                  </tbody>
                </table><!-- .property__tab-content -->
              </div><!-- .property__tab-container -->
            </div><!-- .property__feature -->

            <div class="property__feature">
              <h3 class="property__feature-title property__feature-title--b-spacing">Schedule A Visit</h3>
              <form class="property__form">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="property__form-wrapper">
                      <input type="text" name="date" class="property__form-field property__form-date" placeholder="Monday" data-format="l, F d, Y"  data-min-year="2017"  data-max-year="2020" data-translate-mode="true" data-modal="true" data-large-mode="true" required>
                      <span class="ion-android-calendar property__form-icon"></span>
                    </div><!-- .property__form-wrapper -->
                  </div><!-- col -->
                  <div class="col-sm-6">
                    <div class="property__form-wrapper">
                      <input type="text" name="time" class="property__form-field property__form-time" placeholder="07:30 AM" required>
                      <span class="ion-android-alarm-clock property__form-icon"></span>
                    </div><!-- .property__form-wrapper -->
                  </div><!-- col -->
                  <div class="col-sm-6">
                    <input type="text" name="name" class="property__form-field" placeholder="Your Name" required>
                  </div><!-- col -->
                  <div class="col-sm-6">
                    <input type="text" name="contact" class="property__form-field" placeholder="Your Email/Phone" required>
                  </div><!-- col -->
                  <div class="col-sm-12">
                    <textarea rows="4" name="message" class="property__form-field" placeholder="Message" required></textarea>
                  </div><!-- col -->
                  <div class="col-sm-12">
                    <input name="submit" type="submit" class="property__form-submit" value="Submit"></input>
                  </div><!-- .col -->
                </div><!-- .row -->
              </form>
            </div><!-- .property__feature -->
          </div><!-- .property__feature-container -->
        </main>

        <aside class="col-md-3">
          <div class="widget__container">
            <section class="widget">
<form method="POST" action="http://localhost:8000/contactuss" accept-charset="UTF-8">                
    <div class="contact-form__header">
                  <div class="contact-form__header-container">
                    <div class="contact-info">
                      <h3 class="contact-name"><a href="#">@lang('home.booknow')</a></h3>
                      <a href="tel:+8002883991" class="contact-number">Call: (800) 288 3991</a>
                    </div><!-- .contact-info -->
                  </div><!-- .contact-form__header-container -->
                </div><!-- .contact-form__header -->
                
                <div class="contact-form__body">
                  <input type="text" class="contact-form__field" placeholder="@lang('home.name')" name="name" required>
                  <input type="email" class="contact-form__field" placeholder="@lang('home.email')" name="email" required>
                  <input type="tel" class="contact-form__field" placeholder="@lang('home.phone_number')" name="phone number">
                  <textarea class="contact-form__field contact-form__comment" cols="30" rows="5" placeholder="@lang('home.comment')" name="comment" required></textarea>
                </div><!-- .contact-form__body -->

                <div class="contact-form__footer">
                  <input type="submit" class="contact-form__submit" name="submit" value="@lang('home.send_msg')">
                </div><!-- .contact-form__footer -->
              </form><!-- .contact-form -->
            </section><!-- .widget -->







            <section class="widget widget--white widget--padding-20">
              <h3 class="widget__title">نمازج المشروع</h3>




 @foreach($project_info->buildings as $building)

                                    <?php $image = explode('|', $building->image); ?>

              <div class="similar-home">
                <a href="{{url('الوحدات/'.$building->project->nameurl.'/'.$building->nameurl)}}">
                  <div class="similar-home__image">
                    <div class="similar-home__overlay"></div><!-- .similar-home__overlay -->
                    <img src="{{image_exist($image[0])}}" alt="Residia Nishi Azabu">
                    <span class="similar-home__favorite"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                  </div><!-- .similar-home__image -->
                  <div class="similar-home__content">
                    <h3 class="similar-home__title">{{$building->building_name}}</h3>
                    <span class="similar-home__price">{{$building->building_price}}</span>
                  </div><!-- .similar-home__content -->
                </a>
              </div><!-- .similar-home -->
@endforeach
 
            </section><!-- .widget -->



          </div><!-- .widget__container -->
        </aside>
      </div><!-- .row -->
    </div><!-- .container -->
  </div>































@endsection