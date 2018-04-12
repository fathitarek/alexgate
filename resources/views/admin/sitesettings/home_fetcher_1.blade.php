@extends('admin.layouts.layout')

@section('title')
    تعديل الصفحة الرئيسية Fetcher1
@endsection

@section('header')
    <!-- DataTables -->
    {!! Html::style('admin/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            تعديل الصفحة الرئيسية Fetcher1
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-header">
                        <h3 class="box-title">تعديل إعدادات الموقع</h3>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-body">
                        {{--<form action="{{url('adminpanel/sitesettings')}}" method="POST" enctype="multipart/form-data">--}}
                        {!! Form::model(
                        [
                            'url' => ['adminpanel/homeFetcher1'],
                            'method' => 'POST',
                            'files' => true
                        ]
                    ) !!}
                        {{csrf_field()}}
                    <?php $x=1;?>
                    @foreach($homeFetcher1 as $item)
                        <div class="clearfix"></div>
                        <h3>{{ Lang::get('main.box').' '.$x }}</h3>
                        <?php $x++;?>
                                <div class="col-md-2">
                                   {{ Lang::get('main.icon') }}
                                </div>
                                <div class="col-md-10">
                                        {{ Form::text(
                                            'icon['.$item->id.']',
                                            $item->icon,
                                            [
                                                'class' => 'form-control',
                                                'style' => 'width: 100%; margin-bottom: 5px',
                                            ]
                                        ) }}
                                    @if ($errors->has('icon'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('icon') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            <div class="col-md-2">
                                {{ Lang::get('main.icon_hover') }}
                            </div>
                            <div class="col-md-10">
                                {{ Form::text(
                                    'icon_hover['.$item->id.']',
                                    $item->icon_hover,
                                    [
                                        'class' => 'form-control',
                                        'style' => 'width: 100%; margin-bottom: 5px',
                                    ]
                                ) }}
                                @if ($errors->has('icon_hover'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('icon_hover') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                {{ Lang::get('main.icon_link') }}
                            </div>
                            <div class="col-md-10">
                                {{ Form::text(
                                    'icon_link['.$item->id.']',
                                    $item->icon_link,
                                    [
                                        'class' => 'form-control',
                                        'style' => 'width: 100%; margin-bottom: 5px',
                                    ]
                                ) }}
                                @if ($errors->has('icon_link'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('icon_link') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                {{ Lang::get('main.title') }}
                            </div>
                            <div class="col-md-10">
                                {{ Form::text(
                                    'title['.$item->id.']',
                                    $item->title,
                                    [
                                        'class' => 'form-control',
                                        'style' => 'width: 100%; margin-bottom: 5px',
                                    ]
                                ) }}
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                {{ Lang::get('main.description') }}
                            </div>
                            <div class="col-md-10">
                                {{ Form::text(
                                    'description['.$item->id.']',
                                    $item->description,
                                    [
                                        'class' => 'form-control',
                                        'style' => 'width: 100%; margin-bottom: 5px',
                                    ]
                                ) }}
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                @endif
                            </div>
                            @endforeach



                            <button type="submit" name="submit" class="btn btn-info" value="">
<i class="fa fa-save"></i>                                        حفظ إعدادات الموقع
                            </button>
                        {{--</form>--}}
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection