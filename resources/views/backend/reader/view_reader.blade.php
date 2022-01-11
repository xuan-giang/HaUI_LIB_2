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
                                <h3 class="box-title">Danh sách người đọc</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <a href="{{ route('reader.add') }}" style="float: right; margin-right: 3%"
                                       class="btn btn-rounded btn-success"> Thêm mới</a>
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th style="width: 10%">Mã sinh viên</th>
                                            <th style="width: 20%">Họ tên</th>
                                            <th>Giới tính</th>
                                            <th>Lớp</th>
                                            <th>Số điện thoại</th>
                                            <th>Email</th>
                                            <th style="width: 20%">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($allData as $key => $reader )
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td style="width: 10%"><a href="#">{{ $reader->student_code }}</a></td>
                                                <td style="width: 20%"> {{ $reader->name }}</td>
                                                <td> {{ $reader->gender }}</td>
                                                @foreach($classes as $key => $class )
                                                    @if($reader->class_id == $class->id)
                                                        <td>{{ $class->name_school_year }} - {{ $class->name }}</td>
                                                    @endif
                                                @endforeach
                                                <td> {{ $reader->phone }}</td>
                                                <td><a href="mailto:{{ $reader->email }}">{{ $reader->email }}</a></td>

                                                <td>
                                                    <a href="{{ route('reader.edit',$reader->id) }}"
                                                       class="btn btn-outline-info"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="{{ route('reader.delete',$reader->id) }}" onclick="return confirm('Bạn có chắc chắn xoá?')"
                                                       class="btn btn-outline-danger" id="delete"><i class="fas fa-trash"></i></a>
                                                    <a href="{{ route('reader.detail',$reader->id) }}"
                                                       class="btn btn-outline-primary"><i class="fas fa-eye">
                                                        </i></a>
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
