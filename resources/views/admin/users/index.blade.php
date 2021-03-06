@extends('admin.layouts.layout')

@section('title')
    التحكم في الاعضاء
@endsection

@section('header')
    <!-- DataTables -->
    {!! Html::style('admin/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            التحكم في الاعضاء
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="data" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th id="id" class="text-center">#</th>
                                <th class="text-center">اسم المستخدم</th>
                                <th class="text-center">البريد الالكتروني</th>
                                <th class="text-center">اضيف في</th>
                                <th class="text-center">الصلاحيات</th>
                                <th class="text-center">التحكم</th>
                            </tr>
                            </thead>

                            <tbody class="text-center">

                            </tbody>

                            <tfoot>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">اسم المستخدم</th>
                                    <th class="text-center">البريد الالكتروني</th>
                                    <th class="text-center">اضيف في</th>
                                    <th class="text-center">الصلاحيات</th>
                                    <th class="text-center">التحكم</th>
                                </tr>
                            </tfoot>
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
    <!-- DataTables -->
    {!! Html::script('admin/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('admin/plugins/datatables/dataTables.bootstrap.min.js') !!}

<!-- page script -->
<script>
    var lastIdx = null;

    $('#data thead th').each( function () {
        if($(this).index() == 0 ){
            var classname = $(this).index() == 6  ?  'date' : 'dateslash';
            var title = $(this).html();

            $(this).html( '<input type="text"  style="width:25px" class="' + 'text-center ' + classname + '" data-value="'+ $(this).index() +'" placeholder="'+title+'" />' );
        }
        else if($(this).index() < 5 ){
            var classname = $(this).index() == 6  ?  'date' : 'dateslash';
            var title = $(this).html();

            $(this).html( '<input type="text"  style="width:120px" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder="'+title+'" />' );
        }

        else if($(this).index()  < 4 ){
            var classname = $(this).index() == 6  ?  'date' : 'dateslash';
            var title = $(this).html();

            $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder="'+title+'" />' );
        }
    });

    var table = $('#data').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url('/adminpanel/users/data') }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
            {data: 'admin', name: 'admin'},
            {data: 'control', name: ''}
        ],
        "language": {
            "url": "{{ Request::root()  }}/admin/custom/Arabic.json"
        },
        "stateSave": false,
        "responsive": true,
        "order": [[0, 'desc']],
        "pagingType": "full_numbers",
        aLengthMenu: [
            [25, 50, 100, 200, -1],
            [25, 50, 100, 200, "All"]
        ],
        iDisplayLength: 25,
        fixedHeader: true,

        "oTableTools": {
            "aButtons": [
                {
                    "sExtends": "csv",
                    "sButtonText": "ملف اكسل",
                    "sCharSet": "utf16le"
                },
                {
                    "sExtends": "copy",
                    "sButtonText": "نسخ المعلومات"
                },
                {
                    "sExtends": "print",
                    "sButtonText": "طباعة",
                    "mColumns": "visible"
                }
            ],

            "sSwfPath": "{{ Request::root()  }}/admin/custom/copy_csv_xls_pdf.swf"
        },

        "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
        ,initComplete: function ()
        {
            var r = $('#data tfoot tr');
            r.find('th').each(function(){
                $(this).css('padding', 8);
            });
            $('#data thead').append(r);
            $('#search_0').css('text-align', 'center');
        }

    });

    table.columns().eq(0).each(function(colIdx) {
        $('input', table.column(colIdx).header()).on('keyup change', function() {
            table
                .column(colIdx)
                .search(this.value)
                .draw();
        });
    });

    table.columns().eq(0).each(function(colIdx) {
        $('select', table.column(colIdx).header()).on('change', function() {
            table
                .column(colIdx)
                .search(this.value)
                .draw();
        });

        $('select', table.column(colIdx).header()).on('click', function(e) {
            e.stopPropagation();
        });
    });


    $('#data tbody')
        .on( 'mouseover', 'td', function () {
            var colIdx = table.cell(this).index().column;

            if ( colIdx !== lastIdx ) {
                $( table.cells().nodes() ).removeClass( 'highlight' );
                $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
            }
        } )
        .on( 'mouseleave', function () {
            $( table.cells().nodes() ).removeClass( 'highlight' );
        } );
</script>
@endsection
