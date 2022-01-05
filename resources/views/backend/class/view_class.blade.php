@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">

                <div class="row" style="margin-left: 3%; margin-right: 3%">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Danh mục các đơn vị lớp</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">


                                    <a href="{{ route('class.add') }}" style="float: right; margin-right: 4%"
                                       class="btn btn-rounded btn-success"> Thêm mới</a>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="3%">STT</th>
                                            <th>Tên lớp</th>
                                            <th>Khoá</th>
                                            <th>Số lượng sinh viên</th>
                                            <th>Giáo viên chủ nhiệm</th>
                                            <th width="15%">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($allData as $key => $class )
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td> {{ $class->name }}</td>
                                                <td> {{ $class->name_school_year }}</td>
                                                <td> {{ $class->amount_students }}</td>
                                                <td> {{ $class->teacher_manage }}</td>

                                                <td style="text-align: center">
                                                    <a href="{{ route('class.edit',$class->id) }}"
                                                       class="btn btn-info btn-sm">Edit</a>
                                                    <a href="{{ route('class.delete',$class->id) }}"
                                                       onclick="return confirm('Bạn có chắc chắn xoá?')"
                                                       class="btn btn-danger btn-sm" id="delete">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>

            </section>
            <!-- /.content -->
        </div>
    </div>

@endsection
