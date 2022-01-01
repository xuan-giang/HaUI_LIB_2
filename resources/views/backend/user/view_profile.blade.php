@extends('admin.admin_master')
@section('admin')


    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">


                    <div class="col-12">


                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->

                            <div class="widget-user-header bg-black" >
                                <h3 class="widget-user-username"><b>{{ $user->name }}</b> <h6>{{ $user->gender }}</h6></h3>
                                <a href="{{ route('profile.edit') }}" style="float: right;"
                                   class="btn btn-rounded btn-success mb-5"> Chỉnh sửa</a>


                            </div>
                            <div class="widget-user-image">
                                <img class="rounded-circle" style="height: 90px !important;"
                                     src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image):url('upload/no_image.jpg') }} "
                                     alt="User Avatar">
                            </div>
                            <div class="box-footer">
                                <div class="row" style="margin-top: 3%">
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">Điện thoại</h5>
                                            <span class="description-text">{{ $user->mobile }}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">Email</h5>
                                            <span class="description-text">{{ $user->email }}</span>
{{--                                            <h6 class="widget-user-desc"><b>{{ $user->email }}</b></h6>--}}
                                        </div>
                                        <!-- /.description-block -->
                                    </div>

                                    <!-- /.col -->
                                    <div class="col-sm-4 br-1 bl-1">
                                        <div class="description-block">
                                            <h5 class="description-header">Địa chỉ</h5>
                                            <span class="description-text">{{ $user->address }}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
{{--                                    <div class="col-sm-4">--}}
{{--                                        <div class="description-block">--}}
{{--                                            <h5 class="description-header">Giới tính</h5>--}}
{{--                                            <span class="description-text">{{ $user->gender }}</span>--}}
{{--                                        </div>--}}
{{--                                        <!-- /.description-block -->--}}
{{--                                    </div>--}}
                                    <!-- /.col -->

                                </div>
                                <!-- /.row -->
                            </div>
                        </div>


                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
        </div>
    </div>
@endsection
