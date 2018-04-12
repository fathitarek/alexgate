@extends('admin/layouts/layout')
@section('title')
    اضافة سلايدر
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">اضافة </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(
                          [
                                'url' => ['adminpanel/sliders'],
                                'method' => 'POST',
                                'files' => true
                            ]
                        ) !!}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">العنوان</label>
                            <div class="col-md-6">
                                {{ Form::text(
                                    'title',
                                    '',
                                    [
                                        'placeholder' => 'عنوان السلايدر',
                                        'style' => 'width: 100%; margin-bottom: 5px',
                                        'class' => 'form-control'
                                    ]
                                ) }}
                                @if ($errors->has('title'))
                                    <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">الوصف</label>
                            <div class="col-md-6">
                                {{ Form::text(
                                    'description',
                                    '',
                                    [
                                        'placeholder' => 'اسم url',
                                        'style' => 'width: 100%; margin-bottom: 5px',
                                        'class' => 'form-control'
                                    ]
                                ) }}
                                @if ($errors->has('description'))
                                    <span class="help-block">
               <strong>{{ $errors->first('description') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('url_link') ? ' has-error' : '' }}">
                            <label for="url_link" class="col-md-4 control-label">رابط اقرأ المزيد</label>
                            <div class="col-md-6">
                                {{ Form::text(
                                    'url_link',
                                    '',
                                    [
                                        'placeholder' => 'مكان المشروع',
                                        'style' => 'width: 100%; margin-bottom: 5px',
                                        'class' => 'form-control'
                                    ]
                                ) }}
                                @if ($errors->has('url_link'))
                                    <span class="help-block">
               <strong>{{ $errors->first('url_link') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">الحاله <span class="Mandatory">*</span></label>
                            <div class="col-md-6">
                                <select name="status" required="required" placeholder="الحاله" class="form-control" style="width: 100%; margin-bottom: 5px; padding-bottom:5px;">
                                    <option value="">الحاله</option>
                                    <option value="1" selected >مفعل</option>
                                    <option value="0">غير مفعل</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="building_large_description" class="col-md-4 control-label">صوره السلايدر</label>
                            <div class="col-md-6">
                                <div class="clearfix"></div>
                                <input type="file" id="uploadslider" name="image">
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
                                    اضافة
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