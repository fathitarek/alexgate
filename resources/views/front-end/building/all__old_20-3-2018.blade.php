@extends('front_temp.layouts.app')

@section('title')
    كل الوحدات
@endsection


@section('samples', 'active')

@section('content')



    <div id="page-content">

        <!-- Breadcrumb -->
               <div class="containerme">

            <ol class="breadcrumb">

                <li><a href="{{url('/')}}">الرئيسية</a></li>

                <li>قائمه الوحدات</li>

            </ol>

   </div>




                    @include('front-end/building/share', ['allBuildings'])
                     <div class="text-center">
                        {{
                            $allBuildings->links()
                        }}
                    </div>

                </section><!-- /#properties-->
                </section><!-- /#results -->
                </div><!-- /.col-md-9 -->
<!--el file mfrod ytdaf  include('front-end/building/pages')-->

<!--mn file el div -->
              </div><!-- /.row -->
        </div><!-- /.container -->

    </div>
<!-- a5r -->


          </div><!-- /.row -->
        </div><!-- /.container -->



        
@endsection
