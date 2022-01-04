@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <h1 style="text-align: center">Thống kê theo người đọc</h1>
            <div class="card-body table-responsive p-0" style="height: 500px; ">
                <table id="example2" class="table table-head-fixed text-nowrap">
                    <thead>
                    <tr>
                        <th class="sorting">ID</th>
                        <th class="sorting">Mã sinh viên</th>
                        <th class="sorting">Tên sinh viên</th>
                        <th class="sorting">Số sách mượn</th>
                        <th class="sorting">Số lượt mượn</th>
                        <th class="sorting">Số lượng sự cố</th>
                        <th class="sorting">Đang mượn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allData as $key => $reader )
                        <tr>
                            <td>{{ $reader->id }}</td>
                            <td>{{ $reader->student_code }}</td>
                            <td> {{ $reader->name }}</td>

                            <?php
                            $count_borrow = DB::table('borrows')
                                ->where('reader_id', $reader->id)->count('*');

                            $count_book = DB::table('borrow_details')
                                ->join('borrows', 'borrows.id', '=', 'borrow_details.borrow_id')
                                ->where('reader_id', $reader->id)->count('*');

                            $count_issues = DB::table('issues')
                                ->where('reader_id', $reader->id)->count('*');

                            $count_borrowing = DB::table('borrows')
                                ->where('status', "Đang mượn")
                                ->where('reader_id', $reader->id)->count('*');
                            ?>
                            <td> {{ $count_book }}</td>
                            <td> {{ $count_borrow }}</td>
                            <td> {{ $count_issues }}</td>
                            <td> {{ $count_borrowing }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
