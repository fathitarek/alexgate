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
                           <a href="{{url('all-projects')}}" class="universal-button {{set_class(['type', '0'])}}">
                                <figure class="fa fa-building-o"></figure>
                                <span>كل المشاريع</span>
                                <span class="arrow fa fa-angle-left"></span>
                            </a><!-- /.universal-button --> 
                            <a href="{{url('all-buildings')}}" class="universal-button {{set_class(['all-buildings'])}}">
                                <figure class="fa fa-home"></figure>
                                <span>كل النماذج</span>
                                <span class="arrow fa fa-angle-left"></span>
                            </a><!-- /.universal-button -->

      
                            


                        </aside><!-- /#our-guide -->
                    </section><!-- /#sidebar -->
                </div><!-- /.col-md-3 -->
                <!-- end Sidebar -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>