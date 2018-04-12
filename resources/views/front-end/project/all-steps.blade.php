@extends('front_temp.layouts.app')

@section('title')
    كل المشاريع
@endsection

@section('steps', 'active')


@section('content')

    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">الرئيسية</a></li>
                <li>متابعه المشاريع</li>
            </ol>
   </div>





<div class="container">
            <div class="row">
                <!-- Results -->
                <div class="col-md-9 col-sm-9">
                    <section id="results">
                        <header><h1>متابعه المشاريع</h1></header>

                        <section id="properties" >


@if(count($allprojects) > 0)
    <div class="row">
        @foreach($allprojects as $project)
        <?php $image = explode('|', $project->images); ?>
 <div class="col-md-4 col-sm-4">
                                <div class="property">
                                <figure class="tag status">تحت الانشاء</figure>

                                    <a href="{{url('steps/' . $project->id)}}">
                                        <div class="property-image">
                                            <img class="same lazy" alt="" data-src="/project_images/{{$image[0]}}">
                                        </div>
                                        <div class="overlay">
                                            <div class="info">
                                                <h3>{{$project->project_name}}</h3>
                                                <figure>القاهره</figure>
                                            </div>
                                            <ul class="additional-info">
                                                <li>
                                                    <header>عدد النماذج:</header>
                                                    <figure>3</figure>
                                                </li>
                                            </ul>
                                        </div>
                                    </a>
                                </div><!-- /.property -->
                            </div>
        @endforeach
@else
    <div class="alert alert-danger text-center">لا يوجد مشاريع</div>
@endif

                   




                     <div class="text-center">
                        {{
                            $allprojects->links()
                        }}
                    </div>




                </section><!-- /#properties-->
                </section><!-- /#results -->
                </div><!-- /.col-md-9 -->












<div class="col-md-3 col-sm-3">
                    <section id="sidebar">
                        <aside id="edit-search">
                            <header><h3>بحث متقدم</h3></header>
                            <form role="form" id="form-sidebar" method="GET" class="form-search" action="/search">
                                <div class="form-group">
             {!! Form::select(
                    'rooms',
                    room_numbers(),
                    null,
                    [
                        'placeholder' => 'عدد الغرف',
                        'style' => 'width: 100%'
                    ]
                ) !!}
                                </div><!-- /.form-group -->
                                <div class="form-group">
                {!! Form::select(
                    'building_type',
                    building_type(),
                    null,
                    [
                        'placeholder' => 'نوع النموزج',
                        'style' => 'width: 100%'
                    ]
                ) !!}
                                </div><!-- /.form-group -->
                                <div class="form-group">
                {!! Form::select(
                    'building_rent',
                    building_rent(),
                    null,
                    [
                        'placeholder' => 'نوع العملية',
                        'style' => 'width: 100%'
                    ]
                ) !!}
                                </div><!-- /.form-group -->
                                <div class="form-group">
                     {!! Form::text(
                    'building_area',
                    null,
                    [
                        'placeholder' => 'المساحة',
                        'style' => 'width: 100%'
                    ]
                ) !!}
            </div>
                            <div class="form-group">
                                    <button type="submit" class="btn btn-default">ابحث الان</button>
                                </div><!-- /.form-group -->
                            </form><!-- /#form-map -->
                        </aside><!-- /#edit-search -->

                        <aside id="our-guides">
                            <a href="{{url('all-buildings')}}" class="universal-button {{set_class(['all-buildings'])}}">
                                <figure class="fa fa-building-o"></figure>
                                <span>كل المشاريع</span>
                                <span class="arrow fa fa-angle-left"></span>
                            </a><!-- /.universal-button -->
                            <a href="{{url('for-rent')}}" class="universal-button {{set_class(['for-rent'])}}">
                                <figure class="fa fa-calendar"></figure>
                                <span>مشاريع تحت الانشاء</span>
                                <span class="arrow fa fa-angle-left"></span>
                            </a><!-- /.universal-button -->

                            <a href="{{url('for-buy')}}" class="universal-button {{set_class(['for-buy'])}}">
                                <figure class="fa fa-home"></figure>
                                <span>مشاريع تامه الانشاء</span>
                                <span class="arrow fa fa-angle-left"></span>
                            </a><!-- /.universal-button -->
                        </aside><!-- /#our-guide -->
                    </section><!-- /#sidebar -->
                </div><!-- /.col-md-3 -->
                <!-- end Sidebar -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>

@endsection
