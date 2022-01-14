@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content" id="divToPrint">
                <div class="row" style="margin-left: 3%">
                    <div class="col-12">
                        <div class="box">

                            <!-- /.box-header -->
                            <div class="box-body" id="">
                                <div class="row">
                                    <h1>Tên khoa: {{ $faculty->name }}</h1>

                                </div>

                                <div class="row mr-3">
                                    <div class="table-responsive">
                                        <div class="box-header with-border">
                                            <h6 class="box-title mt-5 text-bold">Danh sách các lớp đào tạo</h6>
                                        </div>

                                        <table id="example3" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th width="5%">STT</th>
                                                <th>Khoá</th>
                                                <th>Tên lớp</th>
                                                <th>GVCN</th>
                                                <th>Số lượng sinh viên</th>
                                                <th>Số lượt mượn</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $key1 = 0;
                                            $total_borrow = 0;
                                            $total_student = 0;
                                            ?>
                                            @foreach($allClass as $key => $class )
                                                <tr>
                                                    <td>{{ $key1+1 }}</td>
                                                    <td> {{ $class->name_school_year }}</td>
                                                    <td> {{ $class->name }}</td>
                                                    <td> {{ $class->teacher_manage }}</td>
                                                    <td> {{ $class->amount_students }}</td>
                                                    <?php
                                                    $count_borrow = DB::table('borrows')
                                                        ->join('readers', 'readers.id', '=', 'borrows.reader_id')
                                                        ->where('class_id', $class->id)->count('*');
                                                    $total_borrow += $count_borrow;
                                                    $total_student += $class->amount_students;
                                                    $key1+=1;
                                                    ?>
                                                    <td>
                                                        {{ $count_borrow }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="4" class="text-bold">Tổng số</td>
                                                <td class="text-bold">
                                                    {{ $total_student }}
                                                </td>
                                                <td class="text-bold">
                                                    {{ $total_borrow }}
                                                </td>
                                            </tr>
                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
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
        </div>
    </div>


{{--    <script>--}}
{{--        $(function () {--}}
{{--            $("#example3").DataTable({--}}
{{--                "responsive": false, "lengthChange": false, "autoWidth": false, "paging": false,"ordering": false, "searching": false,--}}
{{--                "buttons": []--}}
{{--            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');--}}
{{--            $('#example2').DataTable({--}}
{{--                "paging": true,--}}
{{--                "lengthChange": false,--}}
{{--                "searching": false,--}}
{{--                "ordering": true,--}}
{{--                "info": true,--}}
{{--                "autoWidth": false,--}}
{{--                "responsive": true,--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}


@endsection
