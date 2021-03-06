@extends('admin/layouts/layout')



@section('title')

   تعديل خبر

@endsection



@section('content')

    <!-- Main content -->

    <section class="content">

        <div class="row">

            <div class="col-xs-12">

                <div class="box">

                    <div class="box-header">

                        <h3 class="box-title">تعديل عرض</h3>

                    </div>

                    <!-- /.box-header -->

                    <div class="box-body">

                        {!! Form::open(

                            [

                                'url' => ['adminpanel/all-offers',$offer_info->id,'edit'],

                                'method' => 'POST',

                                'files' => true

                            ]

                        ) !!}







{{ csrf_field() }}



<div class="form-group{{ $errors->has('project_name') ? ' has-error' : '' }}">

    <label for="project_name" class="col-md-4 control-label">عنوان العرض</label>



    <div class="col-md-6">

        {{ Form::text(

            'offer_title',

            $offer_info->offer_title,

            [

                'placeholder' => 'عنوان الخبر',

                'style' => 'width: 100%; margin-bottom: 5px',

                'class' => 'form-control'

            ]

        ) }}



        @if ($errors->has('offer_title'))

            <span class="help-block">

                <strong>{{ $errors->first('offer_title') }}</strong>

            </span>

        @endif

    </div>

</div>































<div class="form-group{{ $errors->has('building_large_description') ? ' has-error' : '' }}">



    <label for="project_large_description" class="col-md-4 control-label">تفاصيل العرض</label>



    <div class="col-md-6">

        {{ Form::textarea(

            'offer_description',

            $offer_info->offer_description,

            [

                'rows' => 5,

                'style' => 'width: 100%; margin-bottom: 5px',

                'class' => 'form-control'

            ]

        ) }}



        @if ($errors->has('project_large_description'))

            <span class="help-block">

                <strong>{{ $errors->first('project_large_description') }}</strong>

            </span>

        @endif

<br>

    </div>



</div>




























<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">

    <label for="building_large_description" class="col-md-4 control-label">صور العرض</label>



    <div class="col-md-6">




 @if(isset($offer_info))
            @if($offer_info->images != '')
            <?php   $abc = 0;  ?>
<?php $photoArray = explode("|",$offer_info->images);?>
@foreach ($photoArray as $photo)
<?php
$abc=$abc+1;
?>
<div class="isla{{$abc}} divimage">
    <img class="clientsdb" id="imag{{$abc}}" src="{{Request::root() . '/offers_images/' . $photo}}" width="100px" style="float:right" alt="صورة العقار">


<input type="hidden" id="token" value="{{ csrf_token() }}">
<input type="hidden" value="{{$photo}}" name="delete_file" id="delete_file{{$abc}}" />
<input type="hidden" value="{{$offer_info->id}}" name="offer_id" id="offer_id" />
<img class="img offerx"  id="ex{{$abc}}" src="{{ asset('images/pp.png') }}" alt="delete">
</div>

@endforeach
@endif
@endif

<div class="clearfix"></div>







<div id="images">
<div class="file0 fileimage">
<input type="file" name="images[]" id="ffff" class="file custom-file-input" />
</div>
</div>





        @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>
</div>



<div class="form-group">

    <div class="col-md-6 pull-left">

        <button type="submit" class="btn btn-primary col-md-6 text-center">

            تعديل العرض

        </button>

    </div>

</div>











                            

                        {!! Form::close() !!}

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection



@section('footer')

@endsection