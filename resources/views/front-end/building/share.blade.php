   <div class="containerme">
            <div class="row">
                <!-- Results -->
                <div class="col-md-12 col-sm-12">
                    <section id="results">
                        <header><h1>قائمه الوحدات</h1></header>



@if(count($allBuildings) > 0)
    <div class="row">
        @foreach($allBuildings as $building)
        <?php $image = explode('|', $building->image); ?>

  <div class="col-md-4 col-sm-4">

       <div class="listing-card clearfix">
@if($building->nameurl)
<a href="{{url('الوحدات/'.$building->project->nameurl.'/'.$building->nameurl)}}" >
@else
<a href="{{url('الوحدات/'.$building->project->nameurl.'/'.$building->id)}}" >
@endif
<div class="img-container">
<img src="{{image_exist($image[0])}}" alt="{{$building->building_name}}" width="368">
</div>
</a>
@if($building->nameurl)
<h3><a href="{{url('الوحدات/'.$building->project->nameurl.'/'.$building->nameurl)}}" >{{$building->building_name}}</a></h3>
@else
<h3><a href="{{url('الوحدات/'.$building->project->nameurl.'/'.$building->id)}}" >{{$building->building_name}}</a></h3>
@endif
<p>
@if(isset($building->project->project_name))   
@if($building->project->nameurl)
<a class="location_redirect-link" href="{{url('المشروعات/' . $building->project->nameurl)}}">{{$building->project->project_name}}</a>
@else
<a class="location_redirect-link" href="{{url('المشروعات/' . $building->project->id)}}">{{$building->project->project_name}}</a>
@endif
@endif
</p>
<div class="clearfix">
<div class="price-container">{{$building->building_price}} جنيه</div>
@if($building->nameurl)
<a href="{{url('الوحدات/'.$building->project->nameurl.'/'.$building->nameurl)}}"  class="detailsButton">التفاصيل</a>
@else
<a href="{{url('الوحدات/'.$building->project->nameurl.'/'.$building->id)}}"  class="detailsButton">التفاصيل</a>
@endif
</div>
</div>
</div>
@endforeach
</div><!-- /.row-->

@else
    <div class="alert alert-danger text-center">لا توجد وحدات حاليا</div>
@endif
