@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                <div class="row" style="margin-left: 3%; margin-right: 2%;">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Quản lý mượn trả sách</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <a class="btn bg-gradient-primary" href="{{ route('borrow.add') }}" style="float: right; margin-right: 3%"
                                       class="btn btn-rounded btn-success "> Tạo yêu cầu mượn</a>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th style="width: 10%">Mã phiếu</th>
                                            <th>Mã sinh viên</th>
                                            <th>Bạn đọc</th>
                                            <th style="width: 12%">Số sách mượn</th>
                                            <th style="width: 15%">Trạng thái</th>
                                            <th style="width: 16%">Thao tác</th>
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

                                                @php
                                                    $amount_book = 0;
                                                @endphp

                                                @foreach($borrow_details as $key => $borrow_detail )
                                                    @foreach($books as $key => $book )

                                                        @if($book->id == $borrow_detail->book_id && $borrow_detail->borrow_id == $borrow->id)
                                                            <div style="display:none;">  {{ $amount_book++  }}</div>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                                <td>
                                                    {{ $amount_book  }}
                                                </td>

                                                <td style="font-weight: bold; text-align: center; font-size: 14px">
                                                    @if( $borrow->status == "Đang mượn")
                                                        <div class="progress progress-bar" role="progressbar" style="background-color: red; width: 45%; border-radius: 25px; text-align: center" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100">
                                                            {{ $borrow->status }}
                                                        </div>
                                                    @elseif($borrow->status == "Đã trả")
                                                        <div class="progress progress-bar " role="progressbar" style="background-color: green; width: 41%; border-radius: 25px; text-align: center" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100">
                                                            {{ $borrow->status }}
                                                        </div>
                                                    @else
                                                        <div class="progress progress-bar progress-bar-primary" role="progressbar" style="width: 41%; border-radius: 25px; text-align: center" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100">
                                                            {{ $borrow->status }}
                                                        </div>
                                                    @endif

                                                </td>
                                                <td>
                                                    <a href="{{ route('borrow.detail',$borrow->id) }}"
                                                       class="btn bg-gradient-info btn-sm">Xuất phiếu</a>
                                                    <a href="{{ route('borrow.detail.view', $borrow->id) }}"
                                                       class="btn bg-gradient-warning btn-sm">Chi tiết</a>

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
