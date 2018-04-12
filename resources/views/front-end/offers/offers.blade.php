@extends('front_temp.layouts.app')



@section('title')

    كل العروض

@endsection



@section('offers', 'active')





@section('content')



    <div id="page-content">

        <!-- Breadcrumb -->

        <div class="containerme">

            <ol class="breadcrumb">

                <li><a href="{{url('/')}}">الرئيسية</a></li>

                <li>قائمه العروض</li>

            </ol>

   </div>




<div class="containerme">

            <div class="row">

                <!-- Results -->

                <div class="col-md-12 col-sm-12">

                    <section id="results">

                        <header><h1>قائمه العروض</h1></header>



                        <section id="properties" >





@if(count($offers) > 0)

    <div class="row">

        @foreach($offers as $offer)

        <?php $image = explode('|', $offer->images); ?>






<div class="col-md-4 col-sm-4">

       <div class="listing-card clearfix">

<a href="{{url('العروض/' . $offer->id)}}" >

<div class="img-container">
<img src="/offers_images/{{$image[0]}}" alt="" width="368">

</div>

</a>

<h3><a href="{{url('العروض/' . $offer->id)}}" >{{$offer->offer_title}}</a></h3>

<p>
                               <?php
$string = strip_tags($offer->offer_description);
if (strlen($string) > 500) {
    // truncate string
    $stringCut = substr($string, 0, 500);
    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
}

                                        ?>
<a class="location_redirect-link" href="{{url('العروض/' . $offer->id)}}">{{$string}}</a>
</p>
<div class="clearfix">
<a href="{{url('العروض/' . $offer->id)}}"  class="detailsButton">التفاصيل</a>

</div>
</div>
</div>



        @endforeach

@else

    <div class="alert alert-danger text-center">لا توجد عروض حاليا</div>

@endif


                     <div class="text-center">

                        {{

                            $offers->links()

                        }}

                    </div>


                </section><!-- /#properties-->

                </section><!-- /#results -->

                </div><!-- /.col-md-9 -->


                <!-- end Sidebar -->

            </div><!-- /.row -->

        </div><!-- /.container -->

    </div>


@endsection

