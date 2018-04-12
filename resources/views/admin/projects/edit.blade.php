@extends('admin/layouts/layout')
@section('title')
    تعديل مشروع
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">تعديل '{{$project_info->project_name}}'</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(
                            [
                                'url' => ['adminpanel/projects',$project_info->id,'edit'],
                                'method' => 'POST',
                                'files' => true,
                                'id' => 'formedit'
                            ]
                        ) !!}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('project_name') ? ' has-error' : '' }}">
                            <label for="project_name" class="col-md-4 control-label">اسم المشروع</label>
                            <div class="col-md-6">
                                {{ Form::text(
                                    'project_name',
                                    $project_info->project_name,
                                    [
                                        'placeholder' => 'اسم المشروع',
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
                        <input type="hidden" id="tokeen" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('project_name') ? ' has-error' : '' }}">
                            <label for="project_name" class="col-md-4 control-label">اسم url</label>
                            <div class="col-md-6">
                                {{ Form::text(
                                    'nameurl',
                                    $project_info->nameurl,
                                    [
                                        'placeholder' => 'اسم url',
                                        'style' => 'width: 100%; margin-bottom: 5px',
                                        'class' => 'form-control'
                                    ]
                                ) }}
                                @if (Session::has('msg'))
                                    <div class="alert alert-danger">{{ Session::get('msg') }}</div>
                                @endif
                                @if ($errors->has('project_location'))
                                    <span class="help-block">
               <strong>{{ $errors->first('project_location') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>

                        {{--<div class="form-group{{ $errors->has('project_name') ? ' has-error' : '' }}">
                            <label for="project_name" class="col-md-4 control-label">مكان المشروع</label>
                            <div class="col-md-6">
                                {{ Form::text(
                                    'project_location',
                                    $project_info->project_location,
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
                        </div>--}}
                        <div class="form-group{{ $errors->has('project_location_id') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">{{ Lang::get('main.location') }}<span class="Mandatory">*</span></label>
                            <div class="col-md-6">
                                <select name="project_location_id" class="form-control" required="required" style="width: 100%; margin-bottom: 5px; padding-bottom:5px;">
                                    <option value="">{{ Lang::get('main.location') }}</option>
                                    @foreach($locations as $location)
                                        <option @if(isset($project_info)&&$project_info->project_location_id==$location->id) selected="selected" @endif value="{{ $location->id }}" >{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('project') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">عدد الطوابق </label>
                            <div class="col-md-6">
                                <select name="floors"  placeholder="عدد الطوابق" class="form-control" style="width: 100%; margin-bottom: 5px; padding-bottom:5px;">
                                    <option value="">عدد الطوابق</option>
                                    <option value="1" {{ ($project_info->floors == 1 ? "selected":"") }}>1</option>
                                    <option value="2" {{ ($project_info->floors == 2 ? "selected":"") }}>2</option>
                                    <option value="3" {{ ($project_info->floors == 3 ? "selected":"") }}>3</option>
                                    <option value="4" {{ ($project_info->floors == 4 ? "selected":"") }}>4</option>
                                    <option value="5" {{ ($project_info->floors == 5 ? "selected":"") }}>5</option>
                                    <option value="6" {{ ($project_info->floors == 6 ? "selected":"") }}>6</option>
                                    <option value="7" {{ ($project_info->floors == 7 ? "selected":"") }}>7</option>
                                    <option value="8" {{ ($project_info->floors == 8 ? "selected":"") }}>8</option>
                                    <option value="9" {{ ($project_info->floors == 9 ? "selected":"") }}>9</option>
                                    <option value="10" {{ ($project_info->floors == 10 ? "selected":"") }}>10</option>
                                    <option value="11" {{ ($project_info->floors == 11 ? "selected":"") }}>11</option>
                                    <option value="12" {{ ($project_info->floors == 12 ? "selected":"") }}>12</option>
                                    <option value="13" {{ ($project_info->floors == 13 ? "selected":"") }}>13</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('project_area') ? ' has-error' : '' }}">
                            <label for="project_area" class="col-md-4 control-label">مساحه المشروع</label>
                            <div class="col-md-6">
                                {{Form::text(
                                    'project_area',
                                    $project_info->project_area,
                                    [
                                        'placeholder' => 'مساحة المشروع',
                                        'style' => 'width: 100%; margin-bottom: 5px',
                                        'class' => 'form-control'
                                    ]
                        
                                )}}
                                @if ($errors->has('project_area'))
                                    <span class="help-block">
                <strong>{{ $errors->first('project_area') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('project') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">عدد الجراجات </label>
                            <div class="col-md-6">
                                <select name="garage"  placeholder="عدد الطوابق" class="form-control" style="width: 100%; margin-bottom: 5px; padding-bottom:5px;">
                                    <option value="">عدد الجراجات</option>
                                    <option value="1" {{ ($project_info->garage == 1 ? "selected":"") }}>1</option>
                                    <option value="2" {{ ($project_info->garage == 2 ? "selected":"") }}>2</option>
                                    <option value="3" {{ ($project_info->garage == 3 ? "selected":"") }}>3</option>
                                    <option value="4" {{ ($project_info->garage == 4 ? "selected":"") }}>4</option>
                                    <option value="5" {{ ($project_info->garage == 5 ? "selected":"") }}>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('project_meta') ? ' has-error' : '' }}">
                            <label for="project_meta" class="col-md-4 control-label">الكلمات الدلاليه</label>
                            <div class="col-md-6">
                                {{ Form::text(
                                'project_meta',
                                    $project_info->project_meta,
                                    [
                                        'placeholder' => 'الكلمات الدلاليه',
                                        'style' => 'width: 100%; margin-bottom: 5px',
                                        'class' => 'form-control'
                                    ]
                                ) }}
                                @if ($errors->has('project_meta'))
                                    <span class="help-block">
                <strong>{{ $errors->first('project_meta') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('project_small_description') ? ' has-error' : '' }}">
                            <label for="building_price" class="col-md-4 control-label">وصف المشروع لمحركات البحث</label>
                            <div class="col-md-6">
                                {{ Form::textarea(
                                    'project_small_description',
                                    $project_info->project_small_description,
                                    [
                                        'rows' => 5,
                                        'style' => 'width: 100%; margin-bottom: 5px',
                                        'class' => 'form-control'
                                    ]
                        
                                ) }}
                                @if ($errors->has('project_small_description'))
                                    <span class="help-block">
                <strong>{{ $errors->first('project_small_description') }}</strong>
            </span>
                                @endif
                                <div class="alert alert-warning">لا يمكن ادخال اكثر من 160 حرف</div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('building_large_description') ? ' has-error' : '' }}">
                            <label for="project_large_description" class="col-md-4 control-label">وصف مفصل للمشروع</label>
                            <div class="col-md-6">
                                {{ Form::textarea(
                                    'project_large_description',
                                    $project_info->project_large_description,
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
                                <br><br>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('building_large_description') ? ' has-error' : '' }}">
                            <label for="building_large_description" class="col-md-4 control-label">مميزات المشروع</label>
                            <div class="col-md-6 input_fields_wrap">
                                <div class="inputs">
                                    <?php $featuresp = explode('|', $project_info->project_features); ?>
                                    @foreach ($featuresp as $feature)
                                        <div>
                                            <input type = "text" value="{{$feature}}" class="form-control" placeholder="مميزات المشروع" name= "chk1[]">
                                            <a href="#" class="remove_field">Remove</a>
                                        </div>
                                    @endforeach
                                </div>
                                <button style="float: left;" class="btn btn-primary add_field_button">اضافه ميزه اخري</button>
                                <br><br>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('project') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">حاله المشروع <span class="Mandatory">*</span></label>
                            <div class="col-md-6">
                                <select name="project_status" required="required" placeholder="حاله المشروع" class="form-control" style="width: 100%; margin-bottom: 5px; padding-bottom:5px;">
                                    <option value="">حاله المشروع</option>
                                    <option value="0" {{ ($project_info->project_status == 0 ? "selected":"") }}>مشروع جديد</option>
                                    <option value="1" {{ ($project_info->project_status == 1 ? "selected":"") }}>سابقه اعمال</option>
                                    <option value="2" {{ ($project_info->project_status == 2 ? "selected":"") }}>مخفي</option>
                                </select>
                                <br>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('project_small_description') ? ' has-error' : '' }}">
                            <label for="building_price" class="col-md-4 control-label">طرق الدفع</label>
                            <div class="col-md-6">
                                {{ Form::textarea(
                                    'pay_methods',
                                    $project_info->pay_methods,
                                    [
                                        'rows' => 5,
                                        'style' => 'width: 100%; margin-bottom: 5px',
                                        'class' => 'form-control'
                                    ]
                        
                                ) }}
                                @if ($errors->has('pay_methods'))
                                    <span class="help-block">
                <strong>{{ $errors->first('pay_methods') }}</strong>
            </span>
                                @endif
                                <br>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('building_large_description') ? ' has-error' : '' }}">
                            <label for="building_large_description" class="col-md-4 control-label">مكان المشروع</label>
                            <div class="col-md-6">
                                <input id="pac-input" onPaste="" onkeydown="if (event.keyCode == 13) {return false;}" class="controls form-control" type="text" placeholder="Search Box" style="    position: absolute;
    z-index: 0;
    right: 0px;
    top: 0px;
    width: 50%;">
                                <div id="googleMap" style="height: 350px;"></div>
                                <input type='hidden' value="{{$project_info->lat}}" name='lat' id='lat'>
                                <input type='hidden' value="{{$project_info->lng}}" name='lng' id='lng'>
                                <br>
                                <br>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="building_large_description" class="col-md-4 control-label">صور المشروع</label>
                            <div class="col-md-6">
                                @if(isset($project_info))
                                    @if($project_info->images != '')
                                        <?php   $abc = 0;  ?>
                                        @foreach( explode('|', $project_info->images) as $image)
                                            <?php
                                            $abc=$abc+1;
                                            ?>
                                            <div class="isla{{$abc}} divimage">
                                                <img class="clientsdb" id="imag{{$abc}}" src="{{Request::root() . '/project_images/' . $image}}" width="100px" style="float:right" alt="صورة العقار">
                                                <input type="hidden" id="token" value="{{ csrf_token() }}">
                                                <input type="hidden" value="{{$image}}" name="delete_file" id="delete_file{{$abc}}" />
                                                <input type="hidden" value="{{$project_info->id}}" name="proj_id" id="pro_id" />
                                                <img class="img projbb"  id="ex{{$abc}}" src="{{ asset('images/pp.png') }}" alt="delete">
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
                        <div class="form-group{{ $errors->has('building_large_description') ? ' has-error' : '' }}">
                            <label for="building_large_description" class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                <input type = "checkbox" name="featured" value ="1" {{ (strpos($project_info->featured_project, '1') !== false ? "checked":"") }}> مشروع مميز <br/>
                                <br>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 pull-left">
                                <button type="submit" id="projectedit" class="btn btn-primary col-md-6 text-center">
                                    تعديل المشروع
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