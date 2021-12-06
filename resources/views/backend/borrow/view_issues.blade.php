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
                                <h3 class="box-title">Quản lý sự cố </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
{{--                                    <a href="{{ route('issues.add') }}" style="float: right; margin-right: 3%"--}}
{{--                                       class="btn btn-rounded btn-success "> Nhập sự cố</a>--}}
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th style="width: 10%">ID</th>
                                            <th>Người đọc</th>
                                            <th>Sách</th>
                                            <th>Nội dung sự cố</th>
                                            <th>Người xử lý</th>
                                            <th style="width: 20%">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($allData as $key => $issues )
                                            <tr>
                                                <td style="width: 5%"><a href="#">{{ $issues->id }}</a></td>
                                                @foreach($readers as $key => $reader )
                                                    @if($reader->id == $issues->reader_id)
                                                        <td>{{ $reader->student_code }} - {{ $reader->name }}</td>
                                                    @endif
                                                @endforeach


                                                @foreach($books as $key => $book )
                                                    @if($book->id == $issues->book_id)
                                                        <td>{{ $book->name }}</td>
                                                    @endif
                                                @endforeach

                                                {{--                                                @php--}}
                                                {{--                                                    $amount_book = DB::table('borrow_details')->where('borrow_id', $borrow['id'])->count('*');--}}
                                                {{--                                                @endphp--}}


{{--                                                @foreach($borrow_details as $key => $borrow_detail )--}}
{{--                                                    @foreach($books as $key => $book )--}}

{{--                                                        @if($book->id == $borrow_detail->book_id && $borrow_detail->borrow_id == $borrow->id)--}}
{{--                                                            <div style="display:none;">  {{ $amount_book++  }}</div>--}}
{{--                                                        @endif--}}
{{--                                                    @endforeach--}}
{{--                                                @endforeach--}}
                                                <td>
                                                    {{ $issues->issues_detail }}
                                                </td>

                                                <td style="text-align: center;">

                                                    @foreach($users as $key => $user)
                                                        @if($issues->staff_id == $user->id)
                                                            {{ $user->name }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
{{--                                                    <a href="{{ route('borrow.detail',$borrow->id) }}"--}}
{{--                                                       class="btn btn-info">Xuất phiếu</a>--}}
                                                    <a href=""
                                                       class="btn btn-warning">Chi tiết</a>

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
