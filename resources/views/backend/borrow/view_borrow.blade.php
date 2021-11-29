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
                                <h3 class="box-title">Quản lý mượn trả sách</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <a href="{{ route('borrow.add') }}" style="float: right; margin-right: 3%"
                                       class="btn btn-rounded btn-success "> Tạo yêu cầu mượn</a>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th style="width: 10%">Mã phiếu</th>
                                            <th>Mã sinh viên</th>
                                            <th>Bạn đọc</th>
                                            <th>Số sách mượn</th>
                                            <th>Trạng thái</th>
                                            <th>Ghi chú</th>
                                            <th style="width: 20%">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($allData as $key => $borrow )
                                            <tr>
                                                <td style="width: 10%"><a href="#">{{ $borrow->id }}</a></td>

                                                @foreach($readers as $key => $reader )
                                                    @if($reader->id == $borrow->reader_id)
                                                        <td>{{ $reader->student_code }}</td>
                                                    @endif
                                                @endforeach
                                                @foreach($readers as $key => $reader )
                                                    @if($reader->id == $borrow->reader_id)
                                                        <td>{{ $reader->name }}</td>
                                                    @endif
                                                @endforeach

                                                <td> {{ $borrow->phone }}</td>
                                                <td><a href="mailto:{{ $borrow->email }}">{{ $borrow->email }}</a></td>
                                                <td> {{ $borrow->note }}</td>
                                                <td>
                                                    <a href="{{ route('borrow.detail',$borrow->id) }}"
                                                       class="btn btn-warning">Chi tiết</a>
                                                    <a href=""
                                                       class="btn btn-danger" id="delete">Sự cố</a>
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
