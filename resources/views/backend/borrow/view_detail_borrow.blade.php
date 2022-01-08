@extends('admin.admin_master')
@section('admin')
    <div id="" class="content-wrapper">
        <div class="container-full card card-primary" style="margin-left: 3%; margin-right: 5%">
            <a href="#null" style="margin-left: 80%; " class="btn btn-info" onclick="printContent('printTable')">In phiếu</a>
            <div id="printTable" class=" ml-5">
                <table id="customers" width="100%">
                    <tr>
                        <td>
                            <p style="font-size: 16px; font-weight: bolder; text-transform: uppercase">Trung tâm thông tin thư viện<br>Trường Đại Học Công Nghiệp Hà Nội</p>

                        </td>
                        <td style="text-align: center">
                            <h3 style="text-align: center">PHIẾU MƯỢN SÁCH</h3>
                            <p>Mã phiếu: {{date('Ymd'). $borrow['id'] }}</p>
                        </td>

                    </tr>


                </table>
                @php
                    $user = DB::table('users')->where('id',Auth::user()->id)->first();

                @endphp

                <table id="customers2" style="margin-top: 1%">
                    <tr>
                        <td width="20%"><b>Sinh viên:</b></td>
                        <td width="65%" class="text-bold">{{ $reader['name'] }} - {{ $reader['student_code'] }}</td>
                    </tr>
                    <tr>
                        <td width="20%"><b>Lớp:</b></td>
                        <td width="65%">{{ $class['name'] }} - {{ $class['name_school_year'] }}</td>
                    </tr>
                    <tr>
                        <td width="20%"><b>Thời gian mượn:</b></td>
                        <td width="65%">{{ $borrow['created_at']->format('H:i:s') }} {{ date('d-m-Y', strtotime($borrow['created_at'])) }}</td>
                    </tr>
                </table>
                @if($borrow['status'] == "Đã trả")
                    <div style="position: absolute ; top: 10%; right: 5%;">
                        {{--    <img src="{{ asset('upload/confirm_return_book.png') }}" style="transform: rotate(45deg);" width="200px">--}}
                        <img src="{{ asset('upload/confirm_return_book.png') }}" width="180px">
                    </div>
                @endif

                <table border="2" class="table table-bordered" id="customers" style="margin-top: 2%; text-align: left; border-collapse: collapse; font-size: 13px">

                    <tr>
                        <th width="12%">#ID</th>
                        <th width="40%">Tên sách</th>
                        <th width="30%">&nbsp;Ngày đến hạn</th>
                        <th width="20%">Giá bìa</th>
                    </tr>
                    @php
                        $sumFee = 0;
                    @endphp
                    @foreach($borrow_details as $key => $borrow_detail )
                        @foreach($books as $key => $book )
                            @if($book['id'] == $borrow_detail['book_id'])
                                <div style="display: none">{{$sumFee += $book['price']}}</div>
                                <tr>
                                    <td>{{ $borrow_detail['id'] }}</td>
                                    <td>{{ $book['name'] }}</td>
                                    <td>&nbsp;{{ date('d-m-Y', strtotime($borrow_detail['expire_date'])) }}</td>
                                    <td> {{ number_format($book['price'], 2, ',', '.') }} VND</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    <tr>
                        <td width="80%" colspan="3"><b>Tổng tiền cọc:</b></td>
                        <td width="20%" colspan="1"><b
                                style="background-color: yellow">{{ number_format($sumFee, 2, ',', '.') }} VND</b></td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td width="10%" style="font-size: 12px"><i><b>Ghi chú:</b></i></td>
                        <td width="65%" style="font-size: 12px"><i
                                style="background-color: yellowgreen">{{ $borrow['note'] }}</i></td>
                    </tr>
                </table>
                <table class="ml-10" id="customers1" style="width: 100%; margin-top: 3%; font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            text-align: center;">
                    <tr style="height: 35%">
                        <td>

                            <h4 class="text-bold" style="font-size: 16px;">Thủ thư</h4>
                        </td>
                        <td>
                            <h4 class="text-bold" style="font-size: 16px">Người mượn</h4>
                        </td>
                    </tr>
                    <tr style="height: 35%">
                        <td>
                            <p style="font-size: 12px; font-weight: bold; margin-top: 55px;">{{ $user->name }}</p>
                        </td>
                        <td>
                            <p style="font-size: 12px; font-weight: bold; margin-top: 55px; ">{{ $reader['name'] }}</p>
                        </td>
                    </tr>
                </table>

                <br> <br>
                <i style="font-size: 10px; float: right;"><b>Bạn đọc mang theo phiếu này khi trả sách</b>  </i>
                <i style="font-size: 10px; float: left;"> <b>{{ date("d/m/Y") }} -  https://lic.haui.edu.vn/ </b>  </i>

            </div>

        </div>

    </div>



    <script type="text/javascript">

        function printContent(id) {
            str = document.getElementById(id).innerHTML
            newwin = window.open('', 'printwin', 'left=50,top=50,width=300,height=300')
            newwin.document.write('<HTML>\n<HEAD>\n')
            newwin.document.write('<TITLE>Print Page</TITLE>\n')
            newwin.document.write('<script>\n')
            newwin.document.write('function chkstate(){\n')
            newwin.document.write('if(document.readyState=="complete"){\n')
            newwin.document.write('window.close()\n')
            newwin.document.write('}\n')
            newwin.document.write('else{\n')
            newwin.document.write('setTimeout("chkstate()",2000)\n')
            newwin.document.write('}\n')
            newwin.document.write('}\n')
            newwin.document.write('function print_win(){\n')
            newwin.document.write('window.print();\n')
            newwin.document.write('chkstate();\n')
            newwin.document.write('}\n')
            newwin.document.write('<\/script>\n')
            newwin.document.write('</HEAD>\n')
            newwin.document.write('<BODY onload="print_win()">\n')
            newwin.document.write(str)
            newwin.document.write('</BODY>\n')
            newwin.document.write('</HTML>\n')
            newwin.document.close()
        }

    </script>
@endsection

