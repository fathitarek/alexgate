@extends('admin/layouts/layout')
@section('title')
    تعديل سلايدر
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">تعديل '{{$slider_info->title}}'</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(
                          [
                                'url' => ['adminpanel/sliders',$slider_info->id,'edit'],
                                'method' => 'POST',
                                'files' => true
                            ]
                        ) !!}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('project_name') ? ' has-error' : '' }}">
                            <label for="project_name" class="col-md-4 control-label">العنوان</label>
                            <div class="col-md-6">
                                {{ Form::text(
                                    'title',
                                    $slider_info->title,
                                    [
                                        'placeholder' => 'عنوان السلايدر',
                                        'style' => 'width: 100%; margin-bottom: 5px',
                                        'class' => 'form-control'
                                    ]
                                ) }}
                                @if ($errors->has('project_name'))
                                    <span class="help-block">
                <strong>{{ $errors->first('project_name') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('project_name') ? ' has-error' : '' }}">
                            <label for="project_name" class="col-md-4 control-label">الوصف</label>
                            <div class="col-md-6">
                                {{ Form::text(
                                    'description',
                                    $slider_info->description,
                                    [
                                        'placeholder' => 'اسم url',
                                        'style' => 'width: 100%; margin-bottom: 5px',
                                        'class' => 'form-control'
                                    ]
                                ) }}
                                @if ($errors->has('project_location'))
                                    <span class="help-block">
               <strong>{{ $errors->first('project_location') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('project_name') ? ' has-error' : '' }}">
                            <label for="project_name" class="col-md-4 control-label">رابط اقرأ المزيد</label>
                            <div class="col-md-6">
                                {{ Form::text(
                                    'url_link',
                                    $slider_info->url_link,
                                    [
                                        'placeholder' => 'مكان المشروع',
                                        'style' => 'width: 100%; margin-bottom: 5px',
                                        'class' => 'form-control'
                                    ]
                                ) }}
                                @if ($errors->has('project_location'))
                                    <span class="help-block">
               <strong>{{ $errors->first('project_location') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('project') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">الحاله <span class="Mandatory">*</span></label>
                            <div class="col-md-6">
                                <select name="status" required="required" placeholder="الحاله" class="form-control" style="width: 100%; margin-bottom: 5px; padding-bottom:5px;">
                                    <option value="">الحاله</option>
                                    <option value="1" {{ ($slider_info->status == 1 ? "selected":"") }}>مفعل</option>
                                    <option value="0" {{ ($slider_info->status == 0 ? "selected":"") }}>غير مفعل</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="building_large_description" class="col-md-4 control-label">صوره السلايدر</label>
                            <div class="col-md-6">
                                @if(isset($slider_info))
                                    @if($slider_info->image != '')
                                        <div class="divimage">
                                            <img class="clientsdb" id="sliderimage" src="{{Request::root() . '/sliders/' . $slider_info->image}}" width="100px" style="float:right" alt="صورة السلايدر">
                                            <input type="hidden" id="token" value="{{ csrf_token() }}">
                                            <input type="hidden" value="{{$slider_info->image}}" name="delete_file" id="delete_file" />
                                            <input type="hidden" value="{{$slider_info->id}}" name="slider_id" id="slider_id" />
                                            <img class="img slidbb"  id="ex" src="{{ asset('images/pp.png') }}" alt="delete">
                                        </div>
                                    @endif
                                @endif
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
                                    تعديل
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