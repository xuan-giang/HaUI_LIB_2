@extends('admin.admin_master')
@section('admin')
    <div class="card" style="margin-left: 18%">
        <div class="card-header">
            <h3 class="card-title">Thống kê theo đầu sách</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">

                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                               aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                <th width="3%">STT</th>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">Tên sách
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Tác giả
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Số lượt mượn
                                </th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $key => $book )
                                <tr>
                                    <td> {{ $key+1 }}</td>
                                    <td> {{ $book->name }}</td>
                                    <td> {{ $book->author }}</td>
                                    <?php
                                        $count_book = DB::table('borrow_details')->where('book_id', $book->id)->count('*');
                                    ?>

                                    <td> {{ $count_book }}</td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">

                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                            <ul class="pagination">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
