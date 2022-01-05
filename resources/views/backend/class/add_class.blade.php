@extends('admin.admin_master')
@section('admin')

    <div class="content-wrapper">
        <div class="container-full" style="margin-left: 5%; margin-right: 20%">
            <!-- Content Header (Page header) -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Thêm lớp</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('class.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Tên lớp <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control" placeholder="Nhập tên lớp">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Khoá <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name_school_year" class="form-control" placeholder="Ví dụ: K15">
                                                </div>
                                            </div>
                                            <div class="form-group" style="display: none">
                                                <h5>Nhập số lượng học sinh <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="amount_students" class="form-control" value="0">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Chọn khoa <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="faculty_id" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Chọn khoa đào tạo
                                                        </option>
                                                        @foreach($faculties as $faculty)
                                                            <option
                                                                value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Giáo viên chủ nhiệm</h5>
                                                <div class="controls">
                                                    <input type="text" name="teacher_manage" class="form-control" placeholder="Nhập tên giáo viên chủ nhiệm">
                                                </div>
                                            </div>
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
        </div>
    </div>
@endsection
