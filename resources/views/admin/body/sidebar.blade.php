<aside style="background-color: #522121" class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
{{--    @php--}}
{{--        $user = DB::table('users')->where('id',Auth::user()->id)->first();--}}
{{--    @endphp--}}
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img style="height: 2.1rem !important;"
                    src="{{ (!empty(Auth::user()->image))? url('upload/user_images/'.Auth::user()->image):url('upload/no_image.jpg') }} "
                    class="img-circle elevation-2" alt="User Image">

            </div>
            <div class="info">
                                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
{{--                <a href="#" class="d-block">{{ $user->name }}</a>--}}
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Hoạt động mượn trả
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('borrow.add') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nhập mượn</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('return.add') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nhập trả</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('borrow.view') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý mượn trả</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('issues.view') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sự cố</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Danh mục
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('category.add') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới danh mục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category.view') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý danh mục</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Sách
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('book.add') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm sách mới</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('book.view') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('book.view') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dự trù mua sách</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>
                            Bạn đọc
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('reader.add') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm bạn đọc mới</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('reader.view') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý bạn đọc</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Thống kê
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('statistical.view') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bạn đọc</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('statistical.view.category') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh mục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('statistical.view.book') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('statistical.view.borrow') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Phiếu mượn</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">MORE</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user nav-icon"></i>
                        <p>Quản lý profile</p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('profile.view') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('password.view') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đổi mật khẩu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>
                            Thiết lập chung
                        </p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('faculty.view') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thiết lập khoa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('class.view') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thiết lập lớp</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.setup') }}" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Cài đặt
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>Đăng xuất</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
