@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="content-wrapper ">
        <div class="container-full card card-primary" style="margin-left: 5%; margin-right: 5%">
            <!-- Content Header (Page header) -->
            <section class="content">
                <!-- Basic Forms -->
                <div class="box">
                    <div class="card-header with-border" style="background-color: #0c84ff; color: white">
                        <h2 class="card-title">Tạo yêu cầu mượn sách</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="margin-left: 2%; margin-top: 2%;">
                        <div class="row">
                            <div class="col">

                                <form method="post" action="{{ route('borrow.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="add_item">
                                                <div class="row card-primary">
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="margin-right: 5%">
                                                            <h5>Bạn đọc<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="reader_id" id="reader_id1" required=""
                                                                        class="form-control">
                                                                    <option></option>
                                                                    @foreach($readers as $reader)
                                                                        @php
                                                                            $count_borrowing = DB::table('borrows')->where('reader_id',$reader->id)
                                                                                ->where('status','Đang mượn')->count('*');
                                                                        @endphp
                                                                        <option
                                                                            value="{{ $reader->id }}">{{ $reader->student_code }}
                                                                            - {{ $reader->name }}  - đang mượn: {{ $count_borrowing }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div> <!-- // end form group -->
                                                    </div>
                                                    <div class="col-md-6" style="max-width: 60%">
                                                        <a href="{{ route('reader.add') }}"
                                                           style="float: left; margin-top: 5%"
                                                           class="btn btn-rounded btn-success mb-5">
                                                            Thêm bạn đọc mới</a>
                                                        <div class="form-group" style="display: none">
                                                            <h5>Trạng thái</h5>
                                                            <div class="controls">
                                                                <input type="text" class="form-control" name="status"
                                                                       value="Đang mượn">
                                                            </div>
                                                        </div> <!-- // end form group -->
                                                        <div class="form-group" style="display: none">
                                                            <h5>Người xử lý</h5>
                                                            <div class="controls">
                                                                <input type="text" class="form-control" name="staff_id"
                                                                       value="{{ Auth::user()->id }}">
                                                            </div>
                                                        </div> <!-- // end form group -->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group" style="max-width: 65%">
                                                        <h5>Ghi chú<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                                <textarea class="form-control" name="note"
                                                                          id="note" rows="3" cols="45" required
                                                                          placeholder="Nhập ghi chú"></textarea>

                                                        </div>
                                                    </div> <!-- // end form group -->
                                                </div>

                                                <div class="row">
                                                    <div class="form-group" style="max-width: 65%">
                                                        <h5>Đặt ngày trả <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="expire_date[]"
                                                                   class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-5">

                                                        <div class="form-group">
                                                            <h5>Tên sách <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="book_id[]" id="book_id1" required=""
                                                                        class="form-control">
                                                                    <option value="" selected="" disabled="">Chọn sách
                                                                    </option>
                                                                    @foreach($books as $book)
                                                                        <option
                                                                            value="{{ $book->id }}">{{ $book->name }}
                                                                            [{{ $book->amount }}]
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div> <!-- // end form group -->


                                                    </div> <!-- End col-md-5 -->

                                                    {{--                                                    <div class="col-md-5">--}}

                                                    {{--                                                        <div class="form-group">--}}
                                                    {{--                                                            <h5>Đặt ngày trả <span class="text-danger">*</span></h5>--}}
                                                    {{--                                                            <div class="controls">--}}
                                                    {{--                                                                <input type="date" name="expire_date[]"--}}
                                                    {{--                                                                       class="form-control" required>--}}
                                                    {{--                                                            </div>--}}
                                                    {{--                                                        </div>--}}

                                                    {{--                                                    </div><!-- End col-md-5 -->--}}

                                                    <div class="col-md-2" style="padding-top: 25px;">
                                                        <span class="btn btn-success addeventmore"><i
                                                                class="fa fa-plus-circle"></i> </span>
                                                    </div><!-- End col-md-5 -->

                                                </div> <!-- end Row -->

                                            </div>    <!-- // End add_item -->

                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-outline-primary mb-5"
                                                       onclick="return confirm('Yêu cầu sau khi tạo sẽ không thể thay đổi hoặc xoá!\nBạn có chắc chắn tạo yêu cầu?')"
                                                       value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="print_bill" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked />
                                        <label class="form-check-label" for="flexSwitchCheckChecked"
                                        >In phiếu ngay sau khi tạo</label
                                        >
                                    </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>
        </div>
    </div>


    <div style="visibility: hidden;">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="form-row">

                    <div class="col-md-5">

                        <div class="form-group">
                            <h5>Tên sách <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="book_id[]" id="" required=""
                                        class="form-control">
                                    <option value="" selected="" disabled="">Chọn sách
                                    </option>
                                    @foreach($books as $book)
                                        <option
                                            value="{{ $book->id }}">{{ $book->name }}
                                            [{{ $book->amount }}]
                                        </option>
                                    @endforeach
                                </select>
                                {{--                                <input name="book_id[]" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Chọn sách">--}}

                                {{--                                <datalist id="datalistOptions">--}}
                                {{--                                    <option disabled>Chọn sách</option>--}}
                                {{--                                    @foreach($books as $book)--}}
                                {{--                                        <option data-tokens="{{ $book->name }}"--}}
                                {{--                                                value="{{ $book->id }}">{{ $book->name }} [{{ $book->amount }}]--}}
                                {{--                                        </option>--}}
                                {{--                                    @endforeach--}}
                                {{--                                </datalist>--}}
                            </div>
                        </div> <!-- // end form group -->
                    </div>



                    <div class="col-md-2" style="padding-top: 25px;">
                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>
                    </div><!-- End col-md-2 -->
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            var counter = 0;
            $(document).on("click", ".addeventmore", function () {
                var whole_extra_item_add = $('#whole_extra_item_add').html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click", '.removeeventmore', function (event) {
                $(this).closest(".delete_whole_extra_item_add").remove();
                counter -= 1
            });

        });
    </script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script type="text/javascript">

        $("#reader_id1").select2({
            placeholder: "Chọn bạn đọc",
            allowClear: true
        });
    </script>

    <script type="text/javascript">

        $("#book_id1").select2({
            placeholder: "Chọn sách",
            allowClear: true
        });

    </script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@endsection

