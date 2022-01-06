@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box" style="margin-left: 3%; margin-right: 10%">
                    <div class="box-header with-border">
                        <h4 class="box-title">Tạo mới người đọc</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">

                                <form method="post" action="{{ route('reader.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <h5>Họ tên <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control"
                                                                   placeholder="Nhập họ tên người đọc" required="">
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col Md-6 -->

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <h5>Địa chỉ Email </h5>
                                                        <div class="controls">
                                                            <input type="email" name="email" class="form-control"
                                                                   placeholder="Nhập email người đọc" required=""></div>
                                                    </div>
                                                </div><!-- End Col Md-6 -->

                                            </div> <!-- End Row -->

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Mã sinh viên <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="student_code" class="form-control"
                                                                   placeholder="Nhập mã sinh viên" required=""></div>

                                                    </div>
                                                </div> <!-- End Col Md-6 -->

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Chọn lớp <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="class_id" id="class_id1" required="" class="form-control">
                                                                <option value="" selected="" disabled="">Chọn đơn vị lớp
                                                                </option>
                                                                @foreach($classes as $class)
                                                                    <option
                                                                        value="{{ $class->id }}">{{ $class->name_school_year }}
                                                                        - {{ $class->name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>

                                                </div><!-- End Col Md-6 -->

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Số điện thoại <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="phone" class="form-control"
                                                                   placeholder="Nhập số điện thoại người đọc"
                                                                   required=""></div>

                                                    </div>
                                                </div><!-- End Col Md-6 -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Địa chỉ</h5>
                                                        <div class="controls">
                                                            <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ người đọc" required="">  </div>

                                                    </div>
                                                </div>

                                            </div> <!-- End Row -->


                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <h5>Giới tính <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="gender" id="gender" required=""
                                                                    class="form-control">
                                                                <option value="" selected="" disabled="">Chọn giới
                                                                    tính
                                                                </option>
                                                                <option value="Nam">Nam</option>
                                                                <option value="Nữ">Nữ</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col Md-6 -->

                                                {{--                                                <div class="col-md-6" >--}}
                                                {{--                                                    <div class="form-group">--}}
                                                {{--                                                        <h5>Ảnh đại diện <span class="text-danger">*</span></h5>--}}
                                                {{--                                                        <div class="controls">--}}
                                                {{--                                                            <input type="file" name="image" class="form-control" id="image" >  </div>--}}
                                                {{--                                                    </div>--}}

                                                {{--                                                    <div class="form-group">--}}
                                                {{--                                                        <div class="controls">--}}
                                                {{--                                                            <img id="showImage" src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image):url('upload/no_image.jpg') }}" style="width: 100px; width: 100px; border: 1px solid #000000;">--}}

                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}


                                                {{--                                                </div><!-- End Col Md-6 -->--}}


                                            </div> <!-- End Row -->


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


    <script type="text/javascript">
        $(document).ready(function () {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script type="text/javascript">

        $("#class_id1").select2({
            placeholder: "Chọn lớp học",
            allowClear: true
        });
    </script>



@endsection
