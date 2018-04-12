@extends('admin.layouts.layout')



@section('title')

    التحكم في العروص

@endsection





@section('content')

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            التحكم في العروض

        </h1>

    </section>



    <!-- Main content -->

    <section class="content">

        <div class="row">

            <div class="col-xs-12">

                <div class="box">

                    <!-- /.box-header -->

                    <div class="box-body">

                        <table id="data" class="table table-responsive table-hover">

                            <thead>

                            <tr>

                                <th id="id" class="text-center">#</th>

                                <th class="text-center">عنوان العرض</th>

                                <th class="text-center">تفاصيل العرض</th>

                                <th class="text-center">التحكم</th>

                            </tr>

                            </thead>



                            <tbody class="text-center">



@foreach ($offers as $offer)

<tr>

<td>{{ $offer->id }}</td>

<td><a href="/adminpanel/all-offers/{{$offer->id}}/edit">{{ $offer->offer_title }}</a> </td>

<td>{{ $offer->offer_description }} </td>

<td> <a href="/adminpanel/all-offers/{{$offer->id}}/edit" class="btn btn-info">

         <i class="fa fa-edit"></i>

     </a>

     <a href="/adminpanel/offers/{{$offer->id}}/delete" class="btn btn-danger">

     <i class="fa fa-trash-o"></i>

     </a> 

 </td>





</tr>







@endforeach









                            </tbody>

                        </table>

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