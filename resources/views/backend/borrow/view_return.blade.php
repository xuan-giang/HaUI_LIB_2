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
                                <h3 class="box-title">Nhập trả sách</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th style="width: 8%">Mã phiếu</th>
                                            <th style="width: 10%">Mã sinh viên</th>
                                            <th>Bạn đọc</th>
                                            <th style="width: 35%">Chi tiết sách mượn</th>
                                            <th>Tiền cọc</th>
                                            <th style="width: 8%">Ghi chú</th>
                                            <th style="width: 15%">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($allData as $key => $borrow )
                                            <tr>
                                                <td>{{ $borrow->id }}</td>

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
                                                <td>
                                                    @php
                                                        $stt = 0;
                                                    @endphp
                                                    @foreach($borrow_details as $key => $borrow_detail )
                                                        @foreach($books as $key => $book )

                                                            @if($book->id == $borrow_detail->book_id && $borrow_detail->borrow_id == $borrow->id)
                                                                #{{ $book->id }}. {{ $book->name }} <br>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </td>
                                                <td><a href="mailto:{{ $borrow->email }}">{{ $borrow->email }}</a></td>
                                                <td> {{ $borrow->note }}</td>
                                                <td>
                                                    <input type="submit" class="btn btn-rounded btn-info"
                                                           onclick="return confirm('Xác nhận bạn đọc trả sách!')"
                                                           value="Trả sách">
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
