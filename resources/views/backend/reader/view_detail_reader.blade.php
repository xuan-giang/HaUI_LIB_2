@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper" style="min-height: 1604.8px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thông tin bạn đọc</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">


                                <h3 class="profile-username text-center">{{ $reader->name }}</h3>

                                <p class="text-muted text-center">{{ $reader->student_code }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Tổng lượt mượn</b> <a class="float-right">1,322</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Đang mượn</b> <a class="float-right">543</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Số lỗi</b> <a class="float-right">13,287</a>
                                    </li>
                                </ul>

                                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Lớp học</strong>

                                <p class="text-muted">
                                @foreach($classes as $key => $class )
                                    @if($reader->class_id == $class->id)
                                        <td>{{ $class->name_school_year }} - {{ $class->name }}</td>
                                        @endif
                                        @endforeach
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa chỉ</strong>

                                <p class="text-muted">{{ $reader->address }}</p>

                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Điện thoại</strong>

                                <p class="text-muted">
                                    {{ $reader->phone }}
                                </p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Email</strong>

                                <p class="text-muted">
                                    {{ $reader->email }}
                                </p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                                <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                                                <span class="description">Shared publicly - 7:30 PM today</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                Lorem ipsum represents a long-held tradition for designers,
                                                typographers and the like. Some people hate it and argue for
                                                its demise, but others ignore the hate as they create awesome
                                                tools to help create filler text for everyone from bacon lovers
                                                to Charlie Sheen fans.
                                            </p>

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                                            </p>

                                            <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                        </div>
                                        <!-- /.post -->

                                        <!-- Post -->
                                        <div class="post clearfix">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                                                <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                                                <span class="description">Sent you a message - 3 days ago</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                Lorem ipsum represents a long-held tradition for designers,
                                                typographers and the like. Some people hate it and argue for
                                                its demise, but others ignore the hate as they create awesome
                                                tools to help create filler text for everyone from bacon lovers
                                                to Charlie Sheen fans.
                                            </p>

                                            <form class="form-horizontal">
                                                <div class="input-group input-group-sm mb-0">
                                                    <input class="form-control form-control-sm" placeholder="Response">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-danger">Send</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.post -->

                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                                                <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                                                <span class="description">Posted 5 photos - 5 days ago</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-6">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                                                            <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col-sm-6">
                                                            <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                                                            <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.row -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                                            </p>

                                            <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                        </div>
                                        <!-- /.post -->
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <!-- The timeline -->
                                        <div class="timeline timeline-inverse">
                                            <!-- timeline time label -->
                                            <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-envelope bg-primary"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                                    <div class="timeline-body">
                                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                        quora plaxo ideeli hulu weebly balihoo...
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-user bg-info"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                                    <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                                    </h3>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-comments bg-warning"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                                    <div class="timeline-body">
                                                        Take me to your leader!
                                                        Switzerland is small and neutral!
                                                        We are more like Germany, ambitious and misunderstood!
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline time label -->
                                            <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-camera bg-purple"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                                    <div class="timeline-body">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <div>
                                                <i class="far fa-clock bg-gray"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="settings">
                                        <form method="post" action="{{ route('reader.update',$reader->id) }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <h5>Họ tên <span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input type="text" name="name" class="form-control"
                                                                           value="{{ $reader->name }}" required=""></div>
                                                            </div>

                                                        </div> <!-- End Col Md-6 -->

                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <h5>Địa chỉ Email </h5>
                                                                <div class="controls">
                                                                    <input type="email" name="email" class="form-control"
                                                                           value="{{ $reader->email }}" required=""></div>
                                                            </div>
                                                        </div><!-- End Col Md-6 -->

                                                    </div> <!-- End Row -->

                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <h5>Số điện thoại <span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input type="text" name="phone" class="form-control"
                                                                           value="{{ $reader->phone }}" required=""></div>

                                                            </div>
                                                            <div class="form-group" >
                                                                <h5>Mã sinh viên <span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <input type="text" name="student_code"
                                                                           class="form-control"
                                                                           value="{{ $reader->student_code }}" required="">
                                                                </div>

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
                                                                                value="{{ $class->id }}" {{ ($reader->class_id == $class->id)? "selected":"" }} >{{ $class->name_school_year }}
                                                                                - {{ $class->name }}</option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div><!-- End Col Md-6 -->

                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <h5>Địa chỉ</h5>
                                                                <div class="controls">
                                                                    <input type="text" name="address" class="form-control"
                                                                           value="{{ $reader->address }}" required=""></div>

                                                            </div>

                                                        </div><!-- End Col Md-6 -->


                                                    </div> <!-- End Row -->


                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <h5>Giới tính <span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <select name="gender" id="gender" required=""
                                                                            class="form-control">
                                                                        <option value="" selected="" disabled="">Chọn giới tính</option>
                                                                        <option value="Nam" {{ ($reader->gender == "Nam" ? "selected": "") }}  >Nam</option>
                                                                        <option value="Nữ" {{ ($reader->gender == "Nữ" ? "selected": "") }} >Nữ</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div> <!-- End Col Md-6 -->
                                                    </div>


                                                    <div class="text-xs-right">
                                                        <input type="submit" class="btn btn-rounded btn-danger mb-5"
                                                               value="Cập nhật">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
