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
                        <h3 class="box-title">اضف مشروع</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(
                            [
                                'url' => 'adminpanel/addproject',
                                'method' => 'POST',
                                'id' => 'formmap',
                                'files' => true
                            ]
                        ) !!}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('project_name') ? ' has-error' : '' }}">
                            <label for="project_name" class="col-md-4 control-label">اسم المشروع <span class="Mandatory">*</span></label>
                            <div class="col-md-6">
                                {{ Form::text(
                                    'project_name',
                                    null,
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
                        <div class="form-group{{ $errors->has('project_name') ? ' has-error' : '' }}">
                            <label for="project_name" class="col-md-4 control-label">اسم url <span class="Mandatory">*</span></label>
                            <div class="col-md-6">
                                {{ Form::text(
                                    'nameurl',
                                    null,
                                    [
                                        'placeholder' => 'اسم url',
                                        'style' => 'width: 100%; margin-bottom: 5px',
                                        'class' => 'form-control',
                                        'id' => 'checkk',
                                    ]
                                ) }}
                                @if (Session::has('msg'))
                                    <div class="alert alert-danger">{{ Session::get('msg') }}</div>
                                @endif
                                @if ($errors->has('project_name'))
                                    <span class="help-block">
                <strong>{{ $errors->first('project_name') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>
                        {{--<div class="form-group{{ $errors->has('project_name') ? ' has-error' : '' }}">
                            <label for="project_name" class="col-md-4 control-label">مكان المشروع <span class="Mandatory">*</span></label>
                            <div class="col-md-6">
                                {{ Form::text(
                                    'project_location',
                                    null,
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
                                <select name="project_location_id" placeholder="عدد الحمامات" class="form-control" required="required" style="width: 100%; margin-bottom: 5px; padding-bottom:5px;">
                                    <option value="">{{ Lang::get('main.location') }}</option>
                                    @foreach($locations as $location)
                                        <option @if(isset($building)&&$building->project_location_id==$location->id) selected="selected" @endif value="{{ $location->id }}" >{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('project') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">عدد الطوابق </label>
                            <div class="col-md-6">
                                <select name="floors"  placeholder="عدد الطوابق" class="form-control" style="width: 100%; margin-bottom: 5px; padding-bottom:5px;">
                                    <option value="">عدد الطوابق</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('project_area') ? ' has-error' : '' }}">
                            <label for="project_area" class="col-md-4 control-label">مساحه المشروع <span class="Mandatory">*</span></label>
                            <div class="col-md-6">
                                {{ Form::text(
                                    'project_area',
                                    Request::old('project_area'),
                                    [
                                        'placeholder' => 'مساحة المشروع',
                                        'style' => 'width: 100%; margin-bottom: 5px',
                                        'class' => 'form-control'
                                    ]
                                ) }}
                                @if ($errors->has('project_area'))
                                    <span class="help-block">
                <strong>{{ $errors->first('project_area') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('project') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">عدد الجراجات <span class="Mandatory">*</span></label>
                            <div class="col-md-6">
                                <select name="garage" required="required" placeholder="عدد الطوابق" class="form-control" style="width: 100%; margin-bottom: 5px; padding-bottom:5px;">
                                    <option value="">عدد الجراجات</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('project_meta') ? ' has-error' : '' }}">
                            <label for="project_meta" class="col-md-4 control-label">الكلمات الدلاليه</label>
                            <div class="col-md-6">
                                {{ Form::text(
                                    'project_meta',
                                    null,
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
                            <label for="building_price" class="col-md-4 control-label">وصف المشروع لمحركات البحث <span class="Mandatory">*</span></label>
                            <div class="col-md-6">
                                {{ Form::textarea(
                                    'project_small_description',
                                    null,
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
                            <label for="project_large_description"  class="col-md-4 control-label">وصف مفصل للمشروع <span class="Mandatory">*</span></label>
                            <div class="col-md-6">
                                {{ Form::textarea(
                                    'project_large_description',
                                    null,
                                    [
                                        'rows' => 5,
                                        'style' => 'width: 100%; margin-bottom: 5px',
                                        'class' => 'form-control'            ]
                                ) }}
                                @if ($errors->has('project_large_description'))
                                    <span class="help-block">
                <strong>{{ $errors->first('project_large_description') }}</strong>
            </span>
                                @endif
                                <br>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('building_large_description') ? ' has-error' : '' }}">
                            <label for="building_large_description" class="col-md-4 control-label">مميزات المشروع</label>
                            <div class="col-md-6 input_fields_wrap">
                                <div class="inputs">
                                    <input type = "text" class="form-control" placeholder="مميزات المشروع" name= "chk1[]">
                                    <br>
                                </div>
                                <button style="float: left;" class="btn btn-primary add_field_button">اضافه ميزه اخري</button>
                                <br><br>
                                <!--
                                <input type = "checkbox" name= "chk1[]" value ="القرب من الطرق والمحاور الرئيسية"> لقرب من الطرق والمحاور الرئيسية <br/>
                                <input type = "checkbox" name= "chk1[]" value ="القرب من أكبر منطقة تجمع للنوادي"> القرب من أكبر منطقة تجمع للنوادي <br/>
                                <input type = "checkbox" name= "chk1[]" value ="المنطقة ذات بعد استثماري وسكني مضمون"> المنطقة ذات بعد استثماري وسكني مضمون <br/>
                                <input type = "checkbox" name= "chk1[]" value ="المساحات تبدأ من 176 م الى 222 م"> المساحات تبدأ من 176 م الى 222 م <br/>
                                -->
                                <br>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('project') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">حاله المشروع <span class="Mandatory">*</span></label>
                            <div class="col-md-6">
                                <select name="project_status" required="required" placeholder="حاله المشروع" class="form-control" style="width: 100%; margin-bottom: 5px; padding-bottom:5px;">
                                    <option value="">حاله المشروع</option>
                                    <option value="0">مشروع جديد</option>
                                    <option value="1">سابقه اعمال</option>
                                    <option value="2">مخفي</option>
                                </select>
                                <br>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('building_large_description') ? ' has-error' : '' }}">
                            <label for="pay_methods" class="col-md-4 control-label">طرق الدفع</label>
                            <div class="col-md-6">
                                {{ Form::textarea(
                                    'pay_methods',
                                    null,
                                    [
                                        'rows' => 3,
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
                                <input type='hidden' name='lat' id='lat'>
                                <input type='hidden' name='lng' id='lng'>
                                <br>
                                <br>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="building_large_description" class="col-md-4 control-label">صور المشروع</label>
                            <div class="col-md-6">
                                @if(isset($building))
                                    @if($building->image != '')
                                        <img src="{{Request::root() . '/building_images/' . $building->image}}" width="100px" style="float:right" alt="صورة العقار">
                                    @endif
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
                        </div>
                        <div class="form-group{{ $errors->has('building_large_description') ? ' has-error' : '' }}">
                            <label for="building_large_description" class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                <input type = "checkbox" name="featured" value ="1"> مشروع مميز <br/>
                                <br>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 pull-left">
                                <button type="submit" id="projectadd" class="btn btn-primary col-md-6 text-center">
                                    اضف مشروع
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
    <script type="javascript">
        function duplicateEmail(element){
            alert("Hello! I am an alert box!!");
        }
    </script>
@endsection