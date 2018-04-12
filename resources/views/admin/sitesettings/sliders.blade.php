@extends('admin.layouts.layout')
@section('title')
    التحكم في السلايدر
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            التحكم في السلايدر
        </h1>
        @if($sliderTypes->value=='slider')
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ URL('adminpanel/sliders/create') }}">اضافة</a>
        </div>
        @endif
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(['url'=>'adminpanel/sliders/changeType','method'=>'POST']) !!}
                            <div class="form-group">
                                <label for=""></label>
                                <select name="slider_type" id="slider_type" class="form-control">
                                    <option @if($sliderTypes->value=='slider') selected="selected" @endif value="slider">slider</option>
                                    <option @if($sliderTypes->value=='building') selected="selected" @endif value="building">building</option>
                                </select>
                            </div>
                        <div class="form-group @if($sliderTypes->value=='slider') hidden @endif" id="slider_ids_div">
                            <label for=""></label>
                            <select name="slider_ids[]" style="width: 100%" id="slider_ids" multiple class="form-control">
                                @foreach($buildings as $building)
                                <option @if(in_array($building->id,json_decode($sliderIds->value))) selected="selected" @endif value="{{ $building->id }}">{{ $building->project->project_name.' - '.$building->building_name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <button class="btn btn-primary">حفظ</button>
                        {!! Form::close() !!}
                        @if($sliderTypes->value=='slider')
                            <table id="data" class="table table-responsive table-hover">
                                <thead>
                                <tr>
                                    <th id="id" class="text-center">#</th>
                                    <th class="text-center">العنوان</th>
                                    <th class="text-center">الوصف</th>
                                    <th class="text-center">الرابط</th>
                                    <th class="text-center">الحاله</th>
                                    <th class="text-center">التحكم</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>{{ $slider->id }}</td>
                                        <td><a href="/adminpanel/sliders/{{$slider->id}}/edit">{{ $slider->title }}</a> </td>
                                        <td>{{ $slider->description }} </td>
                                        <td><a target="_blank" href="{{ $slider->url_link }}">{{ urldecode($slider->url_link) }}</a></td>
                                        <td>{{ $slider->status }} </td>
                                        <td> <a href="{{ URL('/adminpanel/sliders/'.$slider->id.'/edit') }}" class="btn btn-info">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
@section('footer')
    <script>
        $(document).on('change','#slider_type',function(){
            if($(this).val()=='slider'){
                $("#slider_ids_div").addClass('hidden')
            }else{
                $("#slider_ids_div").removeClass('hidden')
            }
        })
    </script>
@endsection