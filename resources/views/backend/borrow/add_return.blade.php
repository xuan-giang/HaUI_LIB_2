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
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                        <tr >
                                            <th style="width: 6%">Mã phiếu</th>
                                            <th style="width: 8%">Mã sinh viên</th>
                                            <th>Bạn đọc</th>
                                            <th style="width: 32%">Chi tiết sách mượn</th>
                                            <th>Tiền cọc</th>
                                            <th style="width: 10%">Ghi chú</th>
                                            <th style="width: 22%">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($allData as $key => $borrow )
                                            @if($borrow->status == "Đang mượn")
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
                                                        @foreach($borrow_details as $key => $borrow_detail )
                                                            @foreach($books as $key => $book )

                                                                @if($book->id == $borrow_detail->book_id && $borrow_detail->borrow_id == $borrow->id)
                                                                    #{{ $book->id }}. {{ $book->name }} <br>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @php
                                                            $deposit = 0;
                                                        @endphp
                                                        @foreach($borrow_details as $key => $borrow_detail )
                                                            @foreach($books as $key => $book )

                                                                @if($book->id == $borrow_detail->book_id && $borrow_detail->borrow_id == $borrow->id)
                                                                 <div style="display:none;">  {{ $deposit += $book->price }}</div>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                        <b style="color: red">{{ number_format($deposit, 0, ',', '.') }} </b>
                                                    </td>
                                                    <td> {{ $borrow->note }}</td>
                                                    <td>

                                                        {{--        ADD RETURN BOOK         --}}
                                                        <form method="post" action="{{ route('return.store') }}">
                                                            @csrf
                                                            <div class="row" style="display: none">
                                                                <div class="col-12">
                                                                    <div class="add_item">
                                                                        <div class="row card-primary">
                                                                            <div class="col-md-6">

                                                                            </div>
                                                                            <div class="col-md-6">

                                                                                <div class="form-group">
                                                                                    <h5>Trạng thái</h5>
                                                                                    <div class="controls">
                                                                                        <input type="text"
                                                                                               class="form-control"
                                                                                               name="status"
                                                                                               value="Đã trả">
                                                                                        <input type="text"
                                                                                               class="form-control"
                                                                                               name="borrow_id"
                                                                                               value="{{ $borrow->id }}">
                                                                                    </div>
                                                                                </div> <!-- // end form group -->
                                                                                <div class="form-group">
                                                                                    <h5>Người xử lý</h5>
                                                                                    <div class="controls">
                                                                                        <input type="text"
                                                                                               class="form-control"
                                                                                               name="staff_id"
                                                                                               value="{{ Auth::user()->id }}">
                                                                                    </div>
                                                                                </div> <!-- // end form group -->
                                                                            </div>
                                                                        </div>


                                                                        <div class="row">

                                                                            <div class="col-md-5">
                                                                                @foreach($borrow_details as $borrow_detail)
                                                                                    @if($borrow_detail->borrow_id == $borrow->id)
                                                                                        <div class="form-group">
                                                                                            <h5>Tên sách <span
                                                                                                    class="text-danger">*</span>
                                                                                            </h5>
                                                                                            <div class="controls">

                                                                                                <select name="book_id[]"
                                                                                                        required=""
                                                                                                        class="form-control">
                                                                                                    <option value=""
                                                                                                            selected=""
                                                                                                            disabled="">Chọn
                                                                                                        sách
                                                                                                    </option>


                                                                                                    @foreach($books as $book)

                                                                                                        <option
                                                                                                            value="{{ $book->id }}" {{ ($borrow_detail->book_id == $book->id)? "selected":"" }} >{{ $book->name }}
                                                                                                            [{{ $book->amount }}
                                                                                                            ]
                                                                                                        </option>

                                                                                                    @endforeach
                                                                                                </select>

                                                                                            </div>
                                                                                        </div> <!-- // end form group -->
                                                                                    @endif
                                                                                @endforeach

                                                                            </div> <!-- End col-md-5 -->

                                                                            <div class="col-md-5">
                                                                                @foreach($borrow_details as $borrow_detail)
                                                                                    @if($borrow_detail->borrow_id == $borrow->id)
                                                                                        <div class="form-group">
                                                                                            <h5>Đặt ngày trả <span
                                                                                                    class="text-danger">*</span>
                                                                                            </h5>
                                                                                            <div class="controls">
                                                                                                <input type="date"
                                                                                                       name="expire_date[]"
                                                                                                       value="{{$borrow_detail->expire_date}}"
                                                                                                       class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div><!-- End col-md-5 -->
                                                                            <div class="col-md-5">
                                                                            </div> <!-- End col-md-5 -->
                                                                            <div class="col-md-2"
                                                                                 style="padding-top: 25px;">
                                                                            </div><!-- End col-md-5 -->

                                                                        </div> <!-- end Row -->

                                                                    </div>    <!-- // End add_item -->


                                                                </div>
                                                            </div>



                                                            <input type="submit" class="btn btn-rounded btn-info btn-sm"
                                                                   onclick="return confirm('Xác nhận bạn đọc trả sách!')"
                                                                   value="Trả sách">
                                                            <a href="{{ route('borrow.edit', $borrow->id) }}"
                                                               class="btn btn-warning btn-sm" id="delete">Gia hạn</a>
                                                            <a href="{{ route('issues.add', $borrow->id) }}"
                                                               class="btn btn-danger btn-sm" id="delete">Mất sách</a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif

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
