@extends('front_temp.layouts.app')



@section('title')

    مشروعات سابقه

@endsection



@section('prework', 'active')





@section('content')



    <div id="page-content">

        <!-- Breadcrumb -->

        <div class="containerme">

            <ol class="breadcrumb">

                <li><a href="{{url('/')}}">الرئيسية</a></li>

                <li>مشاريع سابقه</li>

            </ol>

   </div>











<div class="containerme">

            <div class="row">

                <!-- Results -->

                <div class="col-md-12 col-sm-12">

                    <section id="results">

                        <header><h1>قائمه المشاريع</h1></header>



                        <section id="properties" >





@if(count($allprojects) > 0)

    <div class="row">

        @foreach($allprojects as $project)

        <?php $image = explode('|', $project->images); ?>

 <div class="col-md-4 col-sm-4">

       <div class="listing-card clearfix">
@if($project->nameurl)
<a href="{{url('المشروعات/' . $project->nameurl)}}" >
@else
<a href="{{url('المشروعات/' . $project->id)}}" >
@endif
<div class="img-container">
<img src="/project_images/{{$image[0]}}" alt="{{$project->project_name}}" width="368">

</div>

</a>
@if($project->nameurl)
<h3><a href="{{url('المشروعات/' . $project->nameurl)}}" >{{$project->project_name}}</a></h3>
@else
<h3><a href="{{url('المشروعات/' . $project->id)}}" >{{$project->project_name}}</a></h3>
@endif

<p>
<a class="location_redirect-link" href="#">{{$project->project_location}}</a>
</p>
<div class="clearfix">
<div class="price-container"><span class="integer">عدد الوحدات: </span>{{$project->buildings->count()}} </div>
@if($project->nameurl)
<a href="{{url('المشروعات/' . $project->nameurl)}}"  class="detailsButton">التفاصيل</a>
@else
<a href="{{url('المشروعات/' . $project->id)}}"  class="detailsButton">التفاصيل</a>
@endif


</div>
</div>
                            </div>

        @endforeach

@else

    <div class="alert alert-danger text-center">لا توجد مشاريع سابقه حاليا</div>

@endif



                   









                     <div class="text-center">

                        {{

                            $allprojects->links()

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

