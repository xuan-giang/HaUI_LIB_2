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
                                <h3 class="box-title">Danh mục các đầu sách</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <a href="{{ route('category.add') }}" style="float: right; margin-right: 3%"
                                       class="btn btn-rounded btn-success"> Thêm mới</a>
                                    <table id="example1" class="table table-bordered table-striped" >
                                        <thead>
                                        <tr>
                                            <th width="5%" >STT</th>
                                            <th>Tên danh mục</th>
                                            <th>Số lượng đầu sách</th>
                                            <th width="12%">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($allData as $key => $category )
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td> {{ $category->name }}</td>
                                                <td> {{ $category->amount }}</td>
                                                <td>
                                                    <a href="{{ route('category.edit',$category->id) }}"
                                                       class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="{{ route('category.delete',$category->id) }}" onclick="return confirm('Bạn có chắc chắn xoá?')"
                                                       class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>
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
