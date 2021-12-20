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

                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <div class="col">
                                        <form method="post" action="{{ route('faculty.store') }}">
                                            @csrf
                                            <div class="row" style="margin-right: 40%">
                                                <div class="col-12">
                                                    <div class="form-group">

                                                        <div class="controls">
                                                            <h5 >Nhập tên khoa <span class="text-danger">*</span></h5>
                                                            <input type="text" name="name" class="form-control"
                                                                   placeholder="Nhập tên khoa trong trường đại học">
                                                            <input type="text" name="amount" class="form-control"
                                                                   value="0" style="display: none">
                                                            @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="text-xs-right">
                                                        <input type="submit" class="btn btn-rounded btn-info mb-5"
                                                               value="Submit">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Danh sách các khoa đào tạo</h3>
                                    </div>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="5%">STT</th>
                                            <th>Tên khoa</th>
                                            <th>Số lượng lớp trực thuộc</th>
                                            <th width="25%">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($allData as $key => $faculty )
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td> {{ $faculty->name }}</td>
                                                <td> {{ $faculty->amount }}</td>
                                                <td>
                                                    <a href="{{ route('faculty.edit',$faculty->id) }}"
                                                       class="btn btn-info">Edit</a>
                                                    <a href="{{ route('faculty.delete',$faculty->id) }}" onclick="return confirm('Bạn có chắc chắn xoá?')"
                                                       class="btn btn-danger" id="delete">Delete</a>
                                                    <a href="#" onClick="alert('Tính năng này đang trong thời gian phát triển, vui lòng quay lại sau!')"
                                                       class="btn btn-primary" id="detail">Detail</a>
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
