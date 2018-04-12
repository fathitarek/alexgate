@extends('admin/layouts/layout')
@section('title')
    {{ Lang::get('main.add').Lang::get('main.testimonial') }}
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ Lang::get('main.add').Lang::get('main.testimonial') }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(
                            [
                                'url' => 'adminpanel/testimonial',
                                'method' => 'POST',
                                'files' => true
                            ]
                        ) !!}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="project_name" class="col-md-4 control-label">{{ Lang::get('main.name') }}</label>
                            <div class="col-md-6">
                                {{ Form::text(
                                    'name',
                                    null,
                                    [
                                        'placeholder' => Lang::get('main.enter').Lang::get('main.name'),
                                        'style' => 'width: 100%; margin-bottom: 5px',
                                        'class' => 'form-control'
                                    ]
                                ) }}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                            <label for="project_name" class="col-md-4 control-label">{{ Lang::get('main.company') }}</label>
                            <div class="col-md-6">
                                {{ Form::text(
                                    'company',
                                    null,
                                    [
                                        'placeholder' => Lang::get('main.enter').Lang::get('main.company'),
                                        'style' => 'width: 100%; margin-bottom: 5px',
                                        'class' => 'form-control'
                                    ]
                                ) }}
                                @if ($errors->has('company'))
                                    <span class="help-block">
                <strong>{{ $errors->first('company') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">{{ Lang::get('main.description') }}</label>
                            <div class="col-md-6">
                                {{ Form::textarea(
                                    'description',
                                    null,
                                    [
                                        'rows' => 5,
                                        'style' => 'width: 100%; margin-bottom: 5px',
                                        'class' => 'form-control'
                                    ]
                                ) }}
                                @if ($errors->has('description'))
                                    <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
                                @endif
                                <br>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="building_large_description" class="col-md-4 control-label">{{ Lang::get('main.image') }}</label>
                            <div class="col-md-6">
                                <div id="image">
                                    <div class="file0 fileimage">
                                        <input type="file" name="image" id="ffff" class="file custom-file-input" />
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
                        <div class="form-group">
                            <div class="col-md-6 pull-left">
                                <button type="submit" class="btn btn-primary col-md-6 text-center">
                                    {{ Lang::get('main.add') }}
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