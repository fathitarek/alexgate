@extends('admin.layouts.layout')
@section('title')
    {{ Lang::get('main.control_in').Lang::get('main.locations') }}
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ Lang::get('main.control_in').Lang::get('main.locations') }}
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
                                <th class="text-center">{{ Lang::get('main.name') }}</th>
                                <th class="text-center">{{ Lang::get('main.control') }}</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach ($locations as $item)
                                <tr id="locations-{{ $item->id }}">
                                    <td>{{ $item->id }}</td>
                                    <td><a href="{{ URL('adminpanel/locations/'.$item->id.'/edit') }}">{{ $item->name }}</a> </td>
                                    <td> <a href="{{ URL('adminpanel/locations/'.$item->id.'/edit') }}" class="btn btn-info">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-danger delete_this" data-id="{{ $item->id }}">
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
@section('footer')
    <script>
        token= '{{ csrf_token() }}';
        $(document).on('click','.delete_this',function(){
            deleted_id=$(this).attr("data-id");
            event.preventDefault();
            BootstrapDialog.show({
                title: '{{ Lang::get('main.delete').lang::get('main.locations') }}',
                message: '{{ Lang::get('main.delete_this').lang::get('main.locations') }} ?',
                buttons: [
                    {
                        label: '{{ Lang::get('main.yes') }}',
                        cssClass: 'btn-primary',
                        action: function(dialogItself){
                            $.ajax({
                                type: "DELETE",
                                url: "{{ URL('adminpanel/locations') }}/"+deleted_id,
                                data: {"id":deleted_id,_token:token},
                                success: function (msg) {
                                    $("#errors").html(msg);
                                    $("#locations-"+deleted_id).remove();
                                    dialogItself.close();
                                }
                            });
                        }
                    },
                    {
                        label: '{{ Lang::get('main.no') }}',
                        action: function(dialogItself){
                            dialogItself.close();
                        }
                    }]
            });
        })
    </script>
@endsection