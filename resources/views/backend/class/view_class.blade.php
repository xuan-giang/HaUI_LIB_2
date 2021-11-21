@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                <div class="row" style="margin-left: 3%">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Danh mục các đơn vị lớp</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <a href="{{ route('class.add') }}" style="float: right; margin-right: 3%"
                                       class="btn btn-rounded btn-success mb-5"> Thêm mới</a>
                                    <table id="example1" class="table table-bordered table-striped" >
                                        <thead>
                                        <tr>
                                            <th width="5%" >STT</th>
                                            <th>Tên lớp</th>
                                            <th>Khoá</th>
                                            <th>Sĩ số sinh viên</th>
                                            <th>Giáo viên chủ nhiệm</th>
                                            <th width="25%">Thao tác</th>
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
                                                <td>
                                                    <a href="{{ route('class.edit',$class->id) }}"
                                                       class="btn btn-info">Edit</a>
                                                    <a href="{{ route('class.delete',$class->id) }}"
                                                       class="btn btn-danger" id="delete">Delete</a>
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
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
    </div>

@endsection
