@extends('admin.admin_master')
@section('admin')


    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <section class="content">
                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Chỉnh sửa thông tin lớp học</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="margin-left: 3%; margin-right: 5%">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('class.update',$class->id) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Tên lớp <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control"
                                                           value="{{ $class->name }}">
                                                    @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Khoá <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name_school_year" class="form-control"
                                                           value="{{ $class->name_school_year }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Chọn khoa <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="faculty_id" required="" class="form-control"
                                                            value="{{ $class->faculty_id }}">
                                                        <option value="" selected="" disabled="">Chọn khoa đào tạo
                                                        </option>
                                                        @foreach($faculties as $faculty)
                                                            <option
                                                                value="{{ $faculty->id }}" {{ ($class->faculty_id == $faculty->id)? "selected":"" }} >{{ $faculty->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Giáo viên chủ nhiệm</h5>
                                                <div class="controls">
                                                    <input type="text" name="teacher_manage" class="form-control"
                                                           value="{{ $class->teacher_manage }}">
                                                </div>
                                            </div>
                                            <div class="form-group" style="display: none">
                                                <h5>Nhập số lượng học sinh <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="amount_students" class="form-control"
                                                           value="{{ $class->amount_students }}">
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
