@extends('admin.layouts.layout')

@section('title')
    تعديل الصفحة الرئيسية Fetcher2
@endsection

@section('header')
    <!-- DataTables -->
    {!! Html::style('admin/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            تعديل الصفحة الرئيسية Fetcher2
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
                            'url' => ['adminpanel/homeFetcher2'],
                            'method' => 'POST',
                            'files' => true
                        ]
                    ) !!}
                        {{csrf_field()}}
                    <?php $x=1;?>
                    @foreach($homeFetcher2 as $item)
                        <div class="clearfix"></div>
                        <h3>{{ Lang::get('main.box').' '.$x }}</h3>
                        <?php $x++;?>
                                <div class="col-md-2">
                                   {{ Lang::get('main.html') }}
                                </div>
                                <div class="col-md-10">
                                        {{ Form::textarea(
                                            'html['.$item->id.']',
                                            $item->html,
                                            [
                                                'class' => 'form-control',
                                                'style' => 'width: 100%; margin-bottom: 5px',
                                            ]
                                        ) }}
                                    @if ($errors->has('html'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('html') }}</strong>
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