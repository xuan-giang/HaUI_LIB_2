<!DOCTYPE html>
<html>
<head>
    <title>
        Xuất phiếu
    </title>
    <link rel="icon" href="{{ asset('upload/icon_sys.jpg') }}"/>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 13px;
        }

        #customers1 {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        }

        #customers2 {
            font-family: Arial, Helvetica, sans-serif;
            border: none;
            width: 100%;
            text-align: left;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            color: black;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>

</head>
<body style=" position: relative;">


<table id="customers">
    <tr>
        <td>
            <h3 style="text-transform: uppercase">Trung tâm thông tin thư viện</h3>
            <h4>Trường Đại Học Công Nghiệp Hà Nội</h4>
            <p style="font-size: 10px">Điện thoại : +84 243 765 5121</p>
            <p style="font-size: 10px">Email : dhcnhn@haui.edu.vn</p>
        </td>
        <td>
            <h2>PHIẾU MƯỢN SÁCH</h2>
            <p>Mã phiếu: {{ $borrow['id'] }}</p>
        </td>
    </tr>


</table>
@php
    $user = DB::table('users')->where('id',Auth::user()->id)->first();

@endphp

<table id="customers2" style="margin-top: 3%">
    <tr>
        <td width="10%"><b>Sinh viên:</b></td>
        <td width="65%">{{ $reader['name'] }}</td>
    </tr>
    <tr>
        <td width="10%"><b>Mã sinh viên:</b></td>
        <td width="65%">{{ $reader['student_code'] }}</td>
    </tr>
    <tr>
        <td width="10%"><b>Lớp:</b></td>
        <td width="65%">{{ $class['name'] }} - {{ $class['name_school_year'] }}</td>
    </tr>
    <tr>
        <td width="10%"><b>Thời gian mượn:</b></td>
        <td width="65%">{{ $borrow['created_at']->format('H:i:s') }} {{ date('d-m-Y', strtotime($borrow['created_at'])) }}</td>
    </tr>
</table>
@if($borrow['status'] == "Đã trả")
    <div style="position: absolute ; top: 10%; right: 5%;">
        {{--    <img src="{{ asset('upload/confirm_return_book.png') }}" style="transform: rotate(45deg);" width="200px">--}}
        <img src="{{ asset('upload/confirm_return_book.png') }}" width="180px">
    </div>
@endif

<table id="customers" style="margin-top: 3%;">

    <tr>
        <th width="12%">#ID</th>
        <th width="40%">Tên sách</th>
        <th width="30%">Ngày đến hạn</th>
        <th width="20%">Giá niêm yết</th>
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
                    <td>{{ date('d-m-Y', strtotime($borrow_detail['expire_date'])) }}</td>
                    <td> {{ number_format($book['price'], 2, ',', '.') }} VND</td>
                </tr>
            @endif
        @endforeach
    @endforeach
    <tr>
        <td width="80%" colspan="3"><b>Tổng tiền cọc:</b></td>
        <td width="20%" colspan="1"><b>{{ number_format($sumFee, 2, ',', '.') }} VND</b></td>
    </tr>
</table>
<table>
    <tr>
        <td width="10%" style="font-size: 10px"><i><b>Ghi chú:</b></i></td>
        <td width="65%" style="font-size: 10px"><i>{{ $borrow['note'] }}</i></td>
    </tr>
</table>
<table id="customers1" class="table table-bordered" style="margin-top: 5%; border-collapse: collapse; text-align: center" >
    <tr style="height: 35%">
        <td>

            <h4>Thủ thư</h4>
            <i style="font-size: 9px">(Ký và ghi rõ họ tên)</i>
        </td>
        <td>
            <h4>Người mượn</h4>
            <i style="font-size: 9px">(Ký và ghi rõ họ tên)</i>
        </td>
    </tr>
</table>

<table id="customers1" class="table table-bordered" style="margin-top: 15%; border-collapse: collapse; text-align: center" >
    <tr style="height: 530px;" >
        <td>
            <p style="font-size: 12px; font-weight: bold; ">{{ $user->name }}</p>
        </td>
        <td>
            <p style="font-size: 12px; font-weight: bold; ">{{ $reader['name'] }}</p>
        </td>
    </tr>
</table>

<br> <br>
<i style="font-size: 10px; float: right;">Xuất phiếu ngày : {{ date("d/m/Y") }} - Thư viện trường Đại Học Công Nghiệp Hà Nội</i>

</body>
</html>
