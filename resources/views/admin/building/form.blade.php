{{ csrf_field() }}

<div class="form-group{{ $errors->has('building_name') ? ' has-error' : '' }}">
    <label for="building_name" class="col-md-4 control-label">اسم النموزج <span class="Mandatory">*</span></label>

    <div class="col-md-6">
        {{ Form::text(
            'building_name',
            null,
            [
                'placeholder' => 'اسم النموزج',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control',
                'required' => 'required' ,
                'id' => 'buildform'           ]
        ) }}

        @if ($errors->has('building_name'))
            <span class="help-block">
                <strong>{{ $errors->first('building_name') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('building_name') ? ' has-error' : '' }}">
    <label for="building_name" class="col-md-4 control-label">اسم url <span class="Mandatory">*</span></label>

    <div class="col-md-6">
        {{ Form::text(
            'nameurl',
            null,
            [
                'placeholder' => 'اسم url',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control',
                'required' => 'required'            ]
        ) }}


        @if (Session::has('msg'))
            <div class="alert alert-danger">{{ Session::get('msg') }}</div>
        @endif

        @if ($errors->has('building_name'))
            <span class="help-block">
                <strong>{{ $errors->first('building_name') }}</strong>
            </span>
        @endif
    </div>
</div>



{{--<div class="form-group{{ $errors->has('building_location') ? ' has-error' : '' }}">
    <label for="building_location" class="col-md-4 control-label">مكان النموزج </label>

    <div class="col-md-6">
        {{ Form::text(
            'building_location',
            null,
            [
                'placeholder' => 'مكان النموزج',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('building_location'))
            <span class="help-block">
                <strong>{{ $errors->first('building_location') }}</strong>
            </span>
        @endif
    </div>
</div>--}}

<div class="form-group{{ $errors->has('building_location_id') ? ' has-error' : '' }}">
    <label for="status" class="col-md-4 control-label">{{ Lang::get('main.location') }}<span class="Mandatory">*</span></label>
    <div class="col-md-6">
        <select name="building_location_id" placeholder="عدد الحمامات" class="form-control" required="required" style="width: 100%; margin-bottom: 5px; padding-bottom:5px;">
            <option value="">{{ Lang::get('main.location') }}</option>
            @foreach($locations as $location)
                <option @if(isset($building)&&$building->building_location_id==$location->id) selected="selected" @endif value="{{ $location->id }}" >{{ $location->name }}</option>
            @endforeach
        </select>
    </div>
</div>


<div class="form-group{{ $errors->has('project') ? ' has-error' : '' }}">
    <label for="status" class="col-md-4 control-label">عدد الغرف <span class="Mandatory">*</span></label>
    <div class="col-md-6">
        <select name="rooms" placeholder="عدد الحمامات" class="form-control" required="required" style="width: 100%; margin-bottom: 5px; padding-bottom:5px;">
            <option value="">عدد الغرف</option>
            @if(isset($building))
                <option value="1" {{ ($building->rooms == 1 ? "selected":"") }}>1</option>
                <option value="2" {{ ($building->rooms == 2 ? "selected":"") }}>2</option>
                <option value="3" {{ ($building->rooms == 3 ? "selected":"") }}>3</option>
                <option value="4" {{ ($building->rooms == 4 ? "selected":"") }}>4</option>
                <option value="5" {{ ($building->rooms == 5 ? "selected":"") }}>5</option>
                <option value="6" {{ ($building->rooms == 6 ? "selected":"") }}>6</option>
            @else
                <option value="1" >1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>



            @endif
        </select>
    </div>
</div>









<div class="form-group{{ $errors->has('project') ? ' has-error' : '' }}">
    <label for="status" class="col-md-4 control-label">عدد الحمامات <span class="Mandatory">*</span></label>
    <div class="col-md-6">
        <select name="baths" required="required" placeholder="عدد الحمامات" class="form-control" style="width: 100%; margin-bottom: 5px; padding-bottom:5px;">
            <option value="">عدد الحمامات</option>
            @if(isset($building))
                <option value="1" {{ ($building->baths == 1 ? "selected":"") }}>1</option>
                <option value="2" {{ ($building->baths == 2 ? "selected":"") }}>2</option>
                <option value="3" {{ ($building->baths == 3 ? "selected":"") }}>3</option>
                <option value="4" {{ ($building->baths == 4 ? "selected":"") }}>4</option>
                <option value="5" {{ ($building->baths == 5 ? "selected":"") }}>5</option>
                <option value="6" {{ ($building->baths == 6 ? "selected":"") }}>6</option>
            @else
                <option value="1" >1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>




            @endif
        </select>
    </div>
</div>










<div class="form-group{{ $errors->has('building_price') ? ' has-error' : '' }}">
    <label for="building_price" class="col-md-4 control-label">سعر النموزج</label>

    <div class="col-md-6">
        {{ Form::text(
            'building_price',
            null,
            [
                'placeholder' => 'السعر',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('admin'))
            <span class="help-block">
                <strong>{{ $errors->first('building_price') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('building_type') ? ' has-error' : '' }}">
    <label for="building_type" class="col-md-4 control-label">نوع العملية </label>

    <div class="col-md-6">
        {{ Form::select(
            'building_rent',
            building_rent(),
            null,
            [
                'placeholder' => 'نوع العملية',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('building_rent'))
            <span class="help-block">
                <strong>{{ $errors->first('building_rent') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('building_area') ? ' has-error' : '' }}">
    <label for="building_area" class="col-md-4 control-label">مساحة النموزج <span class="Mandatory">*</span></label>

    <div class="col-md-6">
        {{ Form::text(
            'building_area',
            null,
            [
                'placeholder' => 'مساحة النموزج',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control',
                'required' => 'required' 
            ]
        ) }}

        @if ($errors->has('building_area'))
            <span class="help-block">
                <strong>{{ $errors->first('building_area') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('building_type') ? ' has-error' : '' }}">
    <label for="building_type" class="col-md-4 control-label">نوع النموزج</label>

    <div class="col-md-6">
        {{ Form::select(
            'building_type',
            building_type(),
            null,
            [
                'placeholder' => 'نوع النموزج',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('building_type'))
            <span class="help-block">
                <strong>{{ $errors->first('building_type') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('project') ? ' has-error' : '' }}">
    <label for="status" class="col-md-4 control-label">المشروع <span class="Mandatory">*</span></label>
    <div class="col-md-6">
        <select name="project_id" required="required" placeholder="المشروع" class="form-control" style="width: 100%; margin-bottom: 5px; padding-bottom:5px;">
            <option value="">اختر المشروع</option>
            @if (isset($projects))
                @foreach ($projects as $project)
                    @if (isset($building))
                        <option value="{{ $project->id}}" @if($project->id == $building->project_id)selected @endif>{{$project->project_name}}</option>
                    @else
                        <option value="{{ $project->id}}" >{{$project->project_name}}</option>
                    @endif
                @endforeach
            @endif
        </select>
    </div>
</div>




<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    <label for="status" class="col-md-4 control-label">الحالة <span class="Mandatory">*</span></label>

    <div class="col-md-6">
        {{ Form::select(
            'status',
            status(),
            null,
            [
                'placeholder' => 'الحالة',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control',
                'required' => 'required' 
            ]
        ) }}

        @if ($errors->has('status'))
            <span class="help-block">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('building_meta') ? ' has-error' : '' }}">
    <label for="building_meta" class="col-md-4 control-label">الكلمات الدلاليه</label>

    <div class="col-md-6">
        {{ Form::text(
            'building_meta',
            null,
            [
                'placeholder' => 'الكلمات الدلاليه',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('building_meta'))
            <span class="help-block">
                <strong>{{ $errors->first('building_meta') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('building_small_description') ? ' has-error' : '' }}">
    <label for="building_price" class="col-md-4 control-label">وصف النموزج لمحركات البحث</label>

    <div class="col-md-6">
        {{ Form::textarea(
            'building_small_description',
            null,
            [
                'rows' => 5,
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('building_small_description'))
            <span class="help-block">
                <strong>{{ $errors->first('building_small_description') }}</strong>
            </span>
        @endif

        <div class="alert alert-warning">لا يمكن ادخال اكثر من 160 حرف</div>
    </div>
</div>

<div class="form-group{{ $errors->has('building_large_description') ? ' has-error' : '' }}">
    <label for="building_large_description" class="col-md-4 control-label">وصف مفصل للنموزج</label>

    <div class="col-md-6">
        {{ Form::textarea(
            'building_large_description',
            null,
            [
                'rows' => 5,
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('building_large_description'))
            <span class="help-block">
                <strong>{{ $errors->first('building_large_description') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    <label for="building_large_description" class="col-md-4 control-label">صورة النموزج</label>

    <div class="col-md-6">
        @if(isset($building))
            @if($building->image != '')
                <?php   $abc = 0;  ?>

                @foreach ($photoArray as $photo)
                    <?php
                    $abc=$abc+1;
                    ?>
                    <div class="isla{{$abc}} divimage">
                        <img class="clientsdb" id="imag{{$abc}}" src="{{Request::root() . '/building_images/' . $photo}}" width="100px" style="float:right" alt="صورة العقار">


                        <input type="hidden" id="token" value="{{ csrf_token() }}">

                        <input type="hidden" value="{{$photo}}" name="delete_file" id="delete_file{{$abc}}" />

                        <input type="hidden" value="{{$building->id}}" name="proj_id" id="pro_id" />

                        <img class="img buildbb"  id="ex{{$abc}}" src="{{ asset('images/pp.png') }}" alt="delete">
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
        <button type="submit" id="unitadd" class="btn btn-primary col-md-6 text-center">
            اضف نموزج
        </button>
    </div>
</div>
