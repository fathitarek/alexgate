@extends('admin.layouts.layout')

@section('title')
    عملائنا
@endsection

@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <section class="content-header">
        <h1>
            اضافه عملاء
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-header">
                        <h3 class="box-title">صور العملاء</h3>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-body">
                   <form action="{{url('adminpanel/addclients')}}" method="POST" enctype="multipart/form-data">
           
                        {{csrf_field()}}

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">




<div class="col-md-12">

@if(isset($images))
<?php	$abc = 0;  ?>
@foreach($images as $image)
        
<?php
$abc=$abc+1;
?>
        @if($image)
<div class="isla{{$abc}} divimage">
    <img class="clientsdb" id="imag{{$abc}}" src="{{Request::root() . '/clients/' . $image->image}}" width="100px" style="float:right" alt="صورة العقار">
<input type="hidden" id="token" value="{{ csrf_token() }}">
<input type="hidden" value="{{$image->image}}" name="delete_file" id="delete_file{{$abc}}" />
    <img class="img bbb"  id="ex{{$abc}}" src="{{ asset('images/pp.png') }}" alt="delete">
</div>
@endif
@endforeach
@endif

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

    <p class="note">الصور المضافه يجب ان لا تقل عن 1366 * 768 </p>
    </div>
    <button type="submit" name="submit" class="btn btn-info" value="">
    <i class="fa fa-save"></i>حفظ
    </button>
</form>


@endsection