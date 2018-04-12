@extends('admin/layouts/layout')

@section('title')
    إضافة مشروع
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">اضافه مرحله</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(
                            [
                                'url' => 'adminpanel/addlevel',
                                'method' => 'POST',
                                'files' => true
                            ]
                        ) !!}



{{ csrf_field() }}

<div class="form-group{{ $errors->has('project_name') ? ' has-error' : '' }}">
    <label for="project_name" class="col-md-4 control-label">اسم المرحله</label>

    <div class="col-md-6">
        {{ Form::text(
            'level_name',
            null,
            [
                'placeholder' => 'اسم المرحله',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('level_name'))
            <span class="help-block">
                <strong>{{ $errors->first('level_name') }}</strong>
            </span>
        @endif
    </div>
</div>






<div class="form-group{{ $errors->has('project') ? ' has-error' : '' }}">
<label for="status" class="col-md-4 control-label">المشروع</label>
<div class="col-md-6">
<select name="project" placeholder="المشروع" class="form-control" style="width: 100%; margin-bottom: 5px; padding-bottom:5px;">
<option value="">اختر المشروع</option>
@if (isset($projects))
@foreach ($projects as $project)
<option value="{{ $project->id}}" >{{$project->project_name}}</option>
@endforeach
@endif
</select>
</div>
</div>








<div class="form-group{{ $errors->has('project_small_description') ? ' has-error' : '' }}">
    <label for="building_price" class="col-md-4 control-label">وصف مصغر للمرحله</label>

    <div class="col-md-6">
        {{ Form::textarea(
            'level_small_description',
            null,
            [
                'rows' => 5,
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('level_small_description'))
            <span class="help-block">
                <strong>{{ $errors->first('level_small_description') }}</strong>
            </span>
        @endif

        <div class="alert alert-warning">لا يمكن ادخال اكثر من 160 حرف</div>
    </div>
</div>


<div class="form-group{{ $errors->has('building_large_description') ? ' has-error' : '' }}">
    <label for="project_large_description" class="col-md-4 control-label">وصف مفصل للمرحله</label>

    <div class="col-md-6">
        {{ Form::textarea(
            'level_large_description',
            null,
            [
                'rows' => 5,
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('level_large_description'))
            <span class="help-block">
                <strong>{{ $errors->first('level_large_description') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    <label for="building_large_description" class="col-md-4 control-label">صور المرحله</label>

    <div class="col-md-6">


<div id="images">

<div class="file0 fileimage">

<input type="file" name="images[]" id="ffff" class="file custom-file-input" />
</div>


</div>

</div>
</div>


<div class="form-group">
    <div class="col-md-6 pull-left">
        <button type="submit" class="btn btn-primary col-md-6 text-center">
            اضف مرحله
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