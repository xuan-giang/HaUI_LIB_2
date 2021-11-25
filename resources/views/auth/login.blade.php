<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Quản trị hệ thống</title>
    <link rel="icon"
          href="{{ asset('upload/icon_sys.jpg') }}"/>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <style>body {
            color: #000;
            overflow-x: hidden;
            height: 100%;
            background-color: #B0BEC5;
            background-repeat: no-repeat
        }

        .card0 {
            box-shadow: 0px 4px 8px 0px #757575;
            border-radius: 0px
        }

        .card2 {
            margin: 0px 40px
        }

        .logo {
            width: 200px;
            height: 100px;
            margin-top: 20px;
            margin-left: 35px
        }

        .image {
            width: 360px;
            height: 280px
        }

        .border-line {
            border-right: 1px solid #EEEEEE
        }

        .facebook {
            background-color: #3b5998;
            color: #fff;
            font-size: 18px;
            padding-top: 5px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer
        }

        .twitter {
            background-color: #1DA1F2;
            color: #fff;
            font-size: 18px;
            padding-top: 5px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer
        }

        .linkedin {
            background-color: #2867B2;
            color: #fff;
            font-size: 18px;
            padding-top: 5px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer
        }

        .line {
            height: 1px;
            width: 45%;
            background-color: #E0E0E0;
            margin-top: 10px
        }

        .or {
            width: 10%;
            font-weight: bold
        }

        .text-sm {
            font-size: 14px !important
        }

        ::placeholder {
            color: #BDBDBD;
            opacity: 1;
            font-weight: 300
        }

        :-ms-input-placeholder {
            color: #BDBDBD;
            font-weight: 300
        }

        ::-ms-input-placeholder {
            color: #BDBDBD;
            font-weight: 300
        }

        input,
        textarea {
            padding: 10px 12px 10px 12px;
            border: 1px solid lightgrey;
            border-radius: 2px;
            margin-bottom: 5px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            color: #2C3E50;
            font-size: 14px;
            letter-spacing: 1px
        }

        input:focus,
        textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #304FFE;
            outline-width: 0
        }

        button:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0
        }

        a {
            color: inherit;
            cursor: pointer
        }

        .btn-blue {
            background-color: #1A237E;
            width: 150px;
            color: #fff;
            border-radius: 2px
        }

        .btn-blue:hover {
            background-color: #000;
            cursor: pointer
        }

        .bg-blue {
            color: #fff;
            background-color: #1A237E
        }

        @media screen and (max-width: 991px) {
            .logo {
                margin-left: 0px
            }

            .image {
                width: 300px;
                height: 220px
            }

            .border-line {
                border-right: none
            }

            .card2 {
                border-top: 1px solid #EEEEEE !important;
                margin: 0px 15px
            }
        }</style>
</head>
<body oncontextmenu='return false' class='snippet-body'>
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row"><img style="height: auto"
                                          src="https://lic.haui.edu.vn/dnn/web/haui/assets/images/logo-ngang.png"
                                          class="logo"></div>
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"><img
                            src="https://i.imgur.com/uNGdWHi.png" class="image"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    {{--                    Login with social network--}}
                    {{--                    <div class="row mb-4 px-3">--}}
                    {{--                        <h6 class="mb-0 mr-4 mt-2">Sign in with</h6>--}}
                    {{--                        <div class="facebook text-center mr-3">--}}
                    {{--                            <div class="fa fa-facebook"></div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="twitter text-center mr-3">--}}
                    {{--                            <div class="fa fa-twitter"></div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="linkedin text-center mr-3">--}}
                    {{--                            <div class="fa fa-linkedin"></div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="row px-3 mb-4">--}}
                    {{--                        <div class="line"></div> <small class="or text-center">Or</small>--}}
                    {{--                        <div class="line"></div>--}}
                    {{--                    </div>--}}
                    <div class="row px-3 mb-4">
                        <h6 class="text-center" >Trường Đại học Công Nghiệp Hà Nội</h6>
                        <h4 class="text-center" >HỆ THỐNG QUẢN LÝ THƯ VIỆN</h4><br><br><br>
                        <h2 class="text-center" style="margin-left: 18%"><b>ĐĂNG NHẬP HỆ THỐNG</b></h2>
                        <br><br><br>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row px-3"><label class="mb-1">
                                <h6 class="mb-0 text-sm">Email</h6>
                            </label> <input id="email" class="mb-4" type="email" name="email"
                                            placeholder="Nhập địa chỉ email quản trị" required autofocus></div>
                        <div class="row px-3"><label class="mb-1">
                                <h6 class="mb-0 text-sm">Mật khẩu</h6>
                            </label> <input type="password" id="password" name="password" placeholder="Nhập mật khẩu quản trị"></div>
                        <div class="row px-3 mb-4">
                            <div class="custom-control custom-checkbox custom-control-inline"><input id="chk1"
                                                                                                     type="checkbox"
                                                                                                     name="chk"
                                                                                                     class="custom-control-input">
                                <label for="chk1" class="custom-control-label text-sm">Ghi nhớ</label></div>
                            <a href="{{ route('password.request') }}" class="ml-auto mb-0 text-sm">Quên mật khẩu?</a>
                        </div>
                        <div class="row mb-3 px-3">
                            <button type="submit" class="btn btn-blue text-center">Đăng nhập</button>
                        </div>
                        <div class="row mb-4 px-3"><small class="font-weight-bold">Bạn chưa có tài khoản? <a
                                    href="{{ route('register') }}"
                                    class="text-danger ">Đăng ký</a></small></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="bg-blue py-4">
            <div class="row px-3"><small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2021. All rights reserved.</small>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'
        src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
<script type='text/javascript'></script>
<script>
    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.success("{{ session('message') }}");
    @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.error("{{ session('error') }}");
    @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
</body>
</html>
