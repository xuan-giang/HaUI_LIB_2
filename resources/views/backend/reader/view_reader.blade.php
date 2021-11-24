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
                                       class="btn btn-rounded btn-success mb-5"> Thêm mới</a>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="5%">STT</th>
                                            <th>Họ tên</th>
                                            <th>Giới tính</th>
                                            <th>Lớp</th>
                                            <th>Số điện thoại</th>
                                            <th>Email</th>
                                            <th width="25%">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($allData as $key => $reader )
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td> {{ $reader->name }}</td>
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
                                                       class="btn btn-info">Edit</a>
                                                    <a href="{{ route('reader.delete',$reader->id) }}" onclick="return confirm('Bạn có chắc chắn xoá?')"
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
